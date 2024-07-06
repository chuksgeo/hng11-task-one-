<?php

use Illuminate\Http\Request;
use RakibDevs\Weather\Weather;
use Illuminate\Support\Facades\Route;
use Stevebauman\Location\Facades\Location;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "api" middleware group. Make something great!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});



// Route::get('/hello', function (Request $request) {

//     $ip = request()->ip();
//     $visitor = request()->query('visitor_name');
    
//     // $location = Location::get('105.48.250.156');
//     $location = Location::get($ip);

    
//     $weatherClient = new Weather();
//     $weather = $weatherClient->getCurrentByCity($location->cityName);

//     $visitor_name = ($visitor) ? $visitor : 'Guest';    
    
//     $response['client_ip'] =  $ip;
//     $response['location'] = $location->cityName ?? $location->countryName;
//     $response['salutation'] =' Hello, '. trim($visitor_name, "\"' \t\n\r\0\x0B") . '!, the temperature is '. $weather->main->temp . ' degrees Celcius in ' .  $location->cityName;
//     return response()->json($response, 200); 
// });