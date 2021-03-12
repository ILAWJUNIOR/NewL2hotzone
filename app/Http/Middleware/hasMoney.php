<?php

namespace App\Http\Middleware;

use Auth;
use Closure;

class hasMoney
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
        $money = Auth::user()->hasMoneyB ?? Auth::user()->hasMoneyB()->create(['amount' => 0]);
        if ($money->amount < 50) {
            return redirect('/lowamount');
        }

        return $next($request);
    }
}
