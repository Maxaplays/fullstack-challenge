<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class WebController extends Controller
{
    //
    function index()
    {
        $data = Http::get("https://api.weatherapi.com/v1/current.json?key=f00e6c077d404400bb0230542232203&q=39.9451,-165.5767&aqi=no");
        header('Content-Type: application/json; charset=utf-8');
        return json_encode($data);
    }
}