<?php

namespace App\Http\Controllers;

use App\Http\Requests\StoreGeofenceRequest;
use App\Vehicle;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\GuzzleException;
use Illuminate\Http\Request;


class GeofenceController extends Controller
{
    private $resource = 'vega/vehicles/';

    public function show(){

        $client = new Client();

        $response = $client->request(
            'GET',
            env('ENDPOINT_URL') . $this->resource . env('VIN'). '/geofences',
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        $json = json_decode($response->getBody());


        $vehicle = Vehicle::whereVin(env('VIN'))->first();

        if($vehicle){
            if($json){
                $vehicle->active_geofence = $json[0]->id;
            }else{
                $vehicle->active_geofence=null;
            }
            $vehicle->save();

        }


        return $json;

    }

    public function store(StoreGeofenceRequest $request){

        $client = new Client();

        $payload = $request->all();



        try{
        $response = $client->request(
            'POST',
            env('ENDPOINT_URL') . $this->resource . env('VIN'). '/geofences/',
            [
                'cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem'],
                'json' => $payload
            ]);
        } catch(GuzzleException $e){

            return response( $e->getMessage(), 500);
        }

        if($response->getStatusCode() == 201){

            $vehicle = Vehicle::whereVin(env('VIN'))->first();

            $json = json_decode($response->getBody());

            if($vehicle){
                $vehicle->active_geofence= $json->id;
                $vehicle->save();
            }

            return response($response->getBody(), 201);
        }

        return response( 'error '  , $response->getBody());

    }

    public function update(StoreGeofenceRequest $request){

        $client = new Client();

        $payload = $request->all();

        $vehicle = Vehicle::whereVin(env('VIN'))->first();

        if(!$vehicle){
            return response('No Vehicle with the configured VIN', 404);
        }

        if($vehicle->active_geofence){

        $response = $client->request(
            'PUT',
            env('ENDPOINT_URL') . $this->resource . env('VIN'). '/geofences/' . $vehicle->active_gegofence,
            [
                'cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem'],
                'json' => $payload

            ]);

            return $response->getBody();
        }

        return response('No active geofence', 404);
    }

    public function destroy(){

        $client = new Client();

        $vehicle = Vehicle::whereVin(env('VIN'))->first();

        if(!$vehicle){
            return response('No Vehicle with the configured VIN', 404);
        }

        if($vehicle->active_geofence) {
            $response = $client->request(
                'DELETE',
                env('ENDPOINT_URL') . $this->resource . env('VIN') . '/geofences/' . $vehicle->active_geofence,
                ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

            $vehicle->active_geofence=null;
            $vehicle->save();

            return response('Geofence Removed', 200);
        }

        return response('No active geofence', 404);
    }
}
