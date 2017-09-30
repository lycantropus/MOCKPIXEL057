<?php

namespace App\Http\Controllers;

use App\Vehicle;
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

                Vehicle::create([
                    'vin' => $json->vin,
                    'active_geofence' => null,
                    'vehicle_type_id' => null
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
}
