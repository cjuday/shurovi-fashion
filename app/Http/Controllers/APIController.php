<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Inertia\Inertia;

class APIController extends Controller
{
    public function HomePage() {

        return Inertia::render('HomeOne', [
            'data' => app('App\Http\Controllers\SliderController')->index()
        ]);
    }
}
