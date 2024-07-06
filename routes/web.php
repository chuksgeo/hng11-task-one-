<?php

use Illuminate\Http\Request;
use RakibDevs\Weather\Weather;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});



Route::get('/api/hello', function (Request $request) {

    $ip = request()->ip();
    $visitor = request()->query('visitor_name');
    
    // $location = Location::get('105.48.250.156');
    $location = Location::get($ip);

    
    $weatherClient = new Weather();
    $weather = $weatherClient->getCurrentByCity($location->cityName);

    $visitor_name = ($visitor) ? $visitor : 'Guest';    
    
    $response['client_ip'] =  $ip;
    $response['location'] = $location->cityName ?? $location->countryName;
    $response['salutation'] =' Hello, '. trim($visitor_name, "\"' \t\n\r\0\x0B") . '!, the temperature is '. $weather->main->temp . ' degrees Celcius in ' .  $location->cityName;
    return response()->json($response, 200); 
});