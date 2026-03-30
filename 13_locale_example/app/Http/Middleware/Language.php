<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;
use Symfony\Component\HttpFoundation\Response;
use Illuminate\Support\Facades\App;

class Language
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        //comprobar si en la sesión hay un locale, y propagarlo por toda la aplicación
        //porque va a estar en el listado languages
        if (Session()->has('applocale') && array_key_exists(Session()->get('applocale'), config('languages')))
        {
            App::setLocale(Session()->get('applocale'));
        }
        else
        {
            //en caso de que no esté en el listado, usar el idioma de fallback
            App::setLocale(config('app.fallback_locale'));
        }
        return $next($request);
    }
}
