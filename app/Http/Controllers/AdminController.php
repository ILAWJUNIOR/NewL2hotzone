<?php

namespace App\Http\Controllers;

use Auth;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Session;

class AdminController extends Controller
{
    public function __construct()
    {
    }

    public function dashboard(Request $request)
    {
        return view('admin.dashboard');
    }

    /*public function logout()
    {
       return redirect(url('/costa/login'));
    }*/
}
