<?php

namespace App\Http\Controllers;

use App\GeoLog;
use App\Vehicle;
use Carbon\Carbon;
use GuzzleHttp\Client;
use Illuminate\Http\Request;

class VehicleController extends Controller
{

    private $resource = 'vega/vehicles/';

    public function status($fields){


        $client = new Client();

        $response = $client->request(
            'GET',
            env('ENDPOINT_URL') . $this->resource . env('VIN'). '?fields=' . $fields ,
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        $json = json_decode($response->getBody());

        if($json->vin){

            $vehicle = Vehicle::whereVin($json->vin)->first();

            if(!$vehicle){

                $vehicle = Vehicle::create([
                    'vin' => $json->vin,
                    ]);
            }

            if($json->geo){

                $latitude = $json->geo->latitude;
                $longitude = $json->geo->longitude;

                $googleResponse = $client->request(
                    'GET',
                    'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude
                );

                $locationJson = json_decode($googleResponse->getBody());

                $formattedAddress = $locationJson->results[0]->formatted_address;

                GeoLog::create([
                    'vehicle_id' => $vehicle->id,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'location_address' => $formattedAddress? $formattedAddress: 'No address for this geolocation'
                ]);
            }
        }

        return $response->getBody();
    }

    public function lockDoors(){

        $client = new Client();

        $response = $client->request(
            'PUT',
            env('ENDPOINT_URL') . $this->resource . env('VIN'). '/doors/lock',
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        if($response->getStatusCode() == 200){
            return response('Doors locked!', 200);
        }

        return response('error ' . $response->getBody(), $response->getStatusCode());
    }

    public function unlockDoors(){

        $client = new Client();

        $response = $client->request(
            'PUT',
            env('ENDPOINT_URL') . $this->resource . env('VIN'). '/doors/unlock',
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        if($response->getStatusCode() == 200){
            return response('Doors unlocked!', 200);
        }

        return response('error ' . $response->getBody(), $response->getStatusCode());
    }

    public function blinkLights(){

        $client = new Client();

        $response = $client->request(
            'PUT', env('ENDPOINT_URL') . $this->resource . env('VIN'). '/blink',
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        if($response->getStatusCode() == 200){
            return response('Blink!', 200);
        }

        return response('error ' . $response->getBody(), $response->getStatusCode());
    }

    public function engageImmobilizer(){

        $client = new Client();

        $response = $client->request(
            'PUT', env('ENDPOINT_URL') . $this->resource . env('VIN'). '/immobilizer/engage',
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        if($response->getStatusCode() == 200){
            return response('Immobilizer engaged!', 200);
        }

        return response('error ' . $response->getBody(), $response->getStatusCode());
    }

    public function disengageImmobilizer(){

        $client = new Client();

        $response = $client->request(
            'PUT', env('ENDPOINT_URL') . $this->resource . env('VIN'). '/immobilizer/disengage',
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        if($response->getStatusCode() == 200){
            return response('Immobilizer disengaged!', 200);
        }

        return response('error ' . $response->getBody(), $response->getStatusCode());
    }

    public function activateLivetracker(){

        $client = new Client();

        $response = $client->request(
            'PUT', env('ENDPOINT_URL') . $this->resource . env('VIN'). '/livetracking/activate',
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        if($response->getStatusCode() == 200){
            return response('Livetracking activated!', 200);
        }

        return response('error ' . $response->getBody(), $response->getStatusCode());
    }

    public function deactivateLivetracker(){

        $client = new Client();

        $response = $client->request(
            'PUT', env('ENDPOINT_URL') . $this->resource . env('VIN'). '/livetracking/deactivate',
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        if($response->getStatusCode() == 200){
            return response('Livetracking deactivated!', 200);
        }

        return response('error ' . $response->getBody(), $response->getStatusCode());
    }

    public function lastLocation(){

        $client = new Client();

        $response = $client->request(
            'GET',
            env('ENDPOINT_URL') . $this->resource . env('VIN'). '?fields=' . 'geo.latitude,geo.longitude' ,
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        $json = json_decode($response->getBody());

        $vehicle = Vehicle::whereVin(env('VIN'))->first();

        if($vehicle){
            if($json->geo){

                $latitude = $json->geo->latitude;
                $longitude = $json->geo->longitude;

                $googleResponse = $client->request(
                    'GET',
                    'http://maps.googleapis.com/maps/api/geocode/json?latlng='.$latitude.','.$longitude
                );

                $locationJson = json_decode($googleResponse->getBody());

                $formattedAddress = $locationJson->results[0]->formatted_address;

                GeoLog::create([
                    'vehicle_id' => $vehicle->id,
                    'latitude' => $latitude,
                    'longitude' => $longitude,
                    'location_address' => $formattedAddress? $formattedAddress: 'No address for this geolocation'
                ]);
            }
        }
        return $vehicle->geoLogs()->orderBy('created_at')->get();
    }

    public function getStatusEvents(){

        $client = new Client();

        $response = $client->request(
            'GET',
            env('ENDPOINT_URL') . 'vega/events/?cursor=0&vin=' . env('VIN'). '&type=statusChange&limit=1000',
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        $json = json_decode($response->getBody());



        $lastEngineOff= '';

        foreach($json->events as $event){

            if(array_key_exists('engineOn',$event->event )){

                if($event->event->engineOn == false){

                    $lastEngineOff = $event->created;
                }
            }
        }
        $vehicle = Vehicle::whereVin(env('VIN'))->first();
        $vehicle->engine_off_at = Carbon::parse($lastEngineOff);
        $vehicle->save();

        return $response->getBody();
    }

    public function stolen(){

        route('lock-doors');
        route('immobilize');
        route('livetrack');

        return response('theft tracking engaged', 200);
    }
}
