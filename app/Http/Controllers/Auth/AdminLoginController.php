<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use App\Http\Controllers\Controller;
use Hash;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;

class AdminLoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    protected $redirectTo = '/costa/login';

    /**
     * Where to redirect users after login.
     *
     * @var string
     */

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    /*public function login_check(Request $request)
    {
         $email = $request->email;
         $password = $request->password;

         $check = Admin::where('email',$email)->first();
         if(Hash::check($password, $check->password))
         {
             return redirect()->route('costa.dashboard');
         }
         else
         {
             return redirect(url('/costa/login'));
         }
    }*/
    public function __construct()
    {
        $this->middleware('guest', ['except' => 'logout']);
    }

    public function showloginForm()
    {
        return view('admin.login');
    }

    public function authenticate(Request $request)
    {
        $email = $request->input('email');
        $password = $request->input('password');

        if (auth()->guard('admin')->attempt(['email' => $email, 'password' => $password])) {
            return redirect()->intended('costa/dashboard');
        } else {
            return redirect()->intended('costa/login')->with('status', 'Invalid Login Credentials !');
        }
    }

    public function getLogout()
    {
        auth()->guard('admin')->logout();

        return redirect()->intended('costa/login');
    }
}
