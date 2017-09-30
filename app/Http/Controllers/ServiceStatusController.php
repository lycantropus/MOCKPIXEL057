<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;

use GuzzleHttp\Client;

class ServiceStatusController extends Controller
{
    public function status(){

        $client = new Client();

        $response = $client->request(
            'GET',
            env('ENDPOINT_URL') . 'vega/service/check',
            ['cert' => ['../Certificates/pixelcamp.pem', '../Certificates/pixelcamp.pem']]);

        return $response->getBody();

    }
}
