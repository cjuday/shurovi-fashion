<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Inertia\Inertia;

class Controller extends BaseController
{
    use AuthorizesRequests, ValidatesRequests;

    public function testView() {
        $data = ['apple','banana','duck'];

        return Inertia::render('Test', [
            'data' => app('App\Http\Controllers\APIController')->getCountryList()
        ]);
    }
}
