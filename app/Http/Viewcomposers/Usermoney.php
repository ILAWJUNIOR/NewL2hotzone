<?php

namespace App\Http\Viewcomposers;

use Illuminate\View\View;

use Illuminate\Support\Facades\Auth;

class Usermoney
{
    public function compose(View $view)
    {
        Auth::user()->hasMoneyB ?? Auth::user()->hasMoneyB()->create(['amount' => 0]);

        $view->with('userAmount', Auth::user()->hasMoneyB->amount);

        if (! array_key_exists('session_var', $_SESSION)) {
            Auth::logout();
            Session::flush();

            return Redirect::to('/');
        }
    }
}
