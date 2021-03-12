<?php

namespace App\Http\Controllers;

use App;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class DashboardController extends Controller
{
    public function __construct()
    {
    }

    public function index()
    {
        if (Auth::check()) {
            //
            $user = auth()->user();
            dd(Auth::id());
            // echo trans('lang.welcome');

            return view('home');
        }
    }
}
