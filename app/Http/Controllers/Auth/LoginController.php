<?php

namespace App\Http\Controllers\Auth;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;


class LoginController extends Controller
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

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected function redirectTo( ) {
        if (Auth::check() && Auth::user()->role == 'admin') {
            return('/admin');
        }
        elseif (Auth::check() && Auth::user()->role == 'lecturer') {
            return('/lindex');
        }
        elseif (Auth::check() && Auth::user()->role == 'coursedelegate') {
            return('/coursedelegate');
        }
        else {
            return('/home');
        }
    }

     public function getLogout()
    {
    \Auth::logout();
    $request->session()->invalidate();
    return redirect('/home');

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest', ['except' => ['logout', 'getLogout']]);
    }

   
}
