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

Route::get('/welcome', function () {
    return response()->json('e reach', 200);
});
