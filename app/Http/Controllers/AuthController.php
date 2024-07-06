<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use RakibDevs\Weather\Weather;
use Stevebauman\Location\Facades\Location;



class AuthController extends Controller
{
    
    public function welcome(Request $request)
    {
        // $ip = request()->ip();
        $ip = $request->ip();
        $visitor = request()->query('visitor_name');

        
        // $location = Location::get('105.48.250.156');
        $location = Location::get();
        // $location = Location::get($ip);

        
        $weatherClient = new Weather();
        $weather = $weatherClient->getCurrentByCity($location->cityName);

        $visitor_name = ($visitor) ? $visitor : 'Guest';    
        
        $response['client_ip'] =  $ip;
        $response['location'] = $location->cityName ?? $location->countryName;
        $response['salutation'] =' Hello, '. trim($visitor_name, "\"' \t\n\r\0\x0B") . '!, the temperature is '. $weather->main->temp . ' degrees Celcius in ' .  $location->cityName;
        return response()->json($response, 200); 
    }
}
