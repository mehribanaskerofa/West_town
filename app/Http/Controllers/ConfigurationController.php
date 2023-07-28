<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Artisan;

class ConfigurationController extends Controller
{

    public function __construct()
    {

    }

    public function clear()
    {
        Artisan::call('cache:clear');
        Artisan::call('route:clear');

        return redirect()->back();
   }
}
