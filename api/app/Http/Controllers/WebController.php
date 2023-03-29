<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    //
    function index(Request $request)
    {
        $latitude = $request->latitude;
        $longitude = $request->longitude;
        $data = json_decode(Http::get("https://api.weatherapi.com/v1/forecast.json?key=f00e6c077d404400bb0230542232203&q=$latitude,$longitude&days=1&aqi=no&alerts=no"));
        header('Content-Type: application/json; charset=utf-8');
        return $data;
    }
}