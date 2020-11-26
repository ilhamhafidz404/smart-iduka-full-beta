<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;

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
    
    // protected $redirectTo = RouteServiceProvider::HOME

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        // $this->redirectTo = route('redirectLogin');
        $this->middleware('guest')->except('logout');
    }


    protected function authenticated()
    {
      if(Auth::user()->HasRole('super_admin') || Auth::user()->HasRole('admin')) {
        return redirect()->route('dashboard');
      }
      if(Auth::user()->HasRole('company'))
      {
        return redirect()->route('company');
      }

        return redirect()->route('home');
    }

    public function username(){
      $login = request()->input("login");
      $fieldType = filter_var($login, FILTER_VALIDATE_EMAIL) ? 'email' : 'username';
      request()->merge([ $fieldType => $login ]);
      return $fieldType;
    }
}
