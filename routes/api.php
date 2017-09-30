<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('status', function(){

    return response('Online');
});

Route::get('service-status', 'ServiceStatusController@status');


Route::get('vehicle-status/fields/{fields}', 'VehicleController@status');

Route::group(['prefix' => 'vehicle'], function(){

    Route::group(['prefix' => 'doors'], function(){
        Route::put('lock', 'VehicleController@lockDoors')->name('lock-doors');
        Route::put('unlock', 'VehicleController@unlockDoors');

    });

    Route::group(['prefix' => 'lights'], function(){
        Route::put('blink', 'VehicleController@blinkLights');
    });

    Route::group(['prefix' => 'immobilizer'], function(){
       Route::put('engage', 'VehicleController@engageImmobilizer')->name('immobilize');
       Route::put('disengage', 'VehicleController@disengageImmobilizer');
    });

    Route::group(['prefix' => 'livetracking'], function(){
        Route::put('activate', 'VehicleController@activateLivetracker')->name('livetrack');
        Route::put('deactivate', 'VehicleController@deactivateLivetracker');

    });

    Route::get('last-location', 'VehicleController@lastLocation');

    Route::get('status-events', 'VehicleController@getStatusEvents');

    Route::get('stolen', 'VehicleController@stolen');

    Route::group(['prefix' => 'geofence'], function(){

        Route::get('', 'GeofenceController@show');
        Route::post('', 'GeofenceController@store');
        Route::put('', 'GeofenceController@update');
        Route::delete('', 'GeofenceController@destroy');

    });

});


