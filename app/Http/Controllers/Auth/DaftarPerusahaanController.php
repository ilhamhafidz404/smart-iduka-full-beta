<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\ProfileCompany;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;

class DaftarPerusahaanController extends Controller
{
 //    public function __construct()
 //    {
 //        $this->middleware('guest');
 //    }


 //    public function showRegistrationForm()
 //    {
 //        return view('auth.register');
 //    }

 //    protected function guard()
 //    {
 //        return Auth::guard();
 //    }



 //    public function register(Request $request)
	// {
	//       $request->validate([
	//         'username' => ['required', 'string', 'min:6', 'max:255', 'unique:users'],
	//         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	//         'password' => ['required', 'string', 'min:8', 'confirmed'],
	//       ]);

	//       $user = User::create([
	//         'username' => $request->username,
	//         'email' => $request->email,
	//         'password' => Hash::make($request->password),
	//         ]);
	    
	//     $user->assignRole('company');
	    
	//     $user->profileCompany()->save(new profileCompany);
	    
	//     $this->guard()->login($user);

	//     return redirect()->route('company');
	    
	// }


 //    protected function registered(Request $request, $user)
 //    {
 //        //
 //    }


	use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    // protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'username' => ['required','string','max:100','unique:users'],
            'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8', 'confirmed'],
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\Models\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'email' => $data['email'],
            'password' => Hash::make($data['password']),
        ]);
    }

    protected function registered(Request $request,$user)
    {
    	$user->assignRole('company');
	    $user->profileCompany()->save(new profileCompany);

	    $this->guard()->logout();
	    return redirect()->route('login')->with('success','Pendaftaran telah berhasil');
    }
}
