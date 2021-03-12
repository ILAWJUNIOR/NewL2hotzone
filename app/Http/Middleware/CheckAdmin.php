<?php

namespace App\Http\Middleware;

use Closure;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class CheckAdmin
{
    public function handle($request, Closure $next)
    {
        if (! empty(auth()->guard('admin')->id())) {
            $data = DB::table('admins')
                    ->select('admins.usertype', 'admins.id')
                    ->where('admins.id', auth()->guard('admin')->id())
                    ->get();

            if (! $data[0]->id && $data[0]->usertype != 'W') {
                return redirect()->intended('costa/login/')->with('status', 'You do not have access to admin side');
            }

            return $next($request);
        } else {
            return redirect()->intended('costa/login/')->with('status', 'Please Login to access admin area');
        }
    }
}
