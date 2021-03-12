<?php

namespace App\Http\Middleware;

use Cookie;
use Closure;
use Session;
use Redirect;
use Illuminate\Support\Facades\Auth;
use Illuminate\Contracts\Auth\Authenticatable;

class Authenticate
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next, $guard = null)
    {
        $legacyGuard = Auth::guard('legacy');
        if (Auth::guard($guard)->guest() && $legacyGuard->check()) {
            Auth::guard($guard)->login($legacyGuard->user());
            Auth::user()->hasMoneyB ?? Auth::user()->hasMoneyB()->create(['amount' => 0]);
        }

        if (Auth::guard($guard)->guest()) {
            if ($request->ajax() || $request->wantsJson()) {
                return response('Unauthorized.', 401);
            }
            Cookie::queue('state', $request->fullUrl(), time() + (10 * 365 * 24 * 60 * 60), null, null, false, false);

            return redirect(url('/forum/index.php?action=login&page=dashboard'));
        }

        // if(Auth::id()){
        //     // \Cookie::queue(\Cookie::forget('state'));
        // }
        if (! array_key_exists('session_var', $_SESSION)) {

            // dd($_SESSION);
            Auth::logout();
            Session::flush();
            // Session::flush();
            // Auth::guard('legacy')->logout();
            // $request->session()->flush();

            // $request->session()->regenerate();
            // dd($_SESSION);
            return Redirect::route('welcome');
        }

        return $next($request);
    }
}
