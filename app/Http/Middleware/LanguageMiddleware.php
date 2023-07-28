<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;

class LanguageMiddleware
{
    public function handle(Request $request, Closure $next): Response
    {
        if(Session::has('lang')){
            app()->setLocale(Session::get('lang'));
        }
        else{
            app()->setLocale(config('app.fallback_locale'));
        }
        return $next($request);
    }
}
