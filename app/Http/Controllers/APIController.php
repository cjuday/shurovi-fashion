<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Illuminate\Support\Facades\Http;

class APIController extends Controller
{
    function getCountryList() {
        $response = Http::get('https://restcountries.com/v3.1/all');

        $data = json_decode($response);

        foreach($data as $dt){
            dd($dt);
        }
    }
}
