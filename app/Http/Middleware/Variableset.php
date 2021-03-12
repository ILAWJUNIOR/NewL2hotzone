<?php

namespace App\Http\Middleware;

use Closure;
use Session;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

//session_start();
class Variableset
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        //print_r(Session::all());die;
        if (array_key_exists('session_var', $_SESSION) && array_key_exists('session_value', $_SESSION)) {
            view()->share('session_var', $_SESSION['session_var']);
            view()->share('session_value', $_SESSION['session_value']);
        } else {
            view()->share('session_var', '');
            view()->share('session_value', '');
        }

        return $next($request);
    }
}
