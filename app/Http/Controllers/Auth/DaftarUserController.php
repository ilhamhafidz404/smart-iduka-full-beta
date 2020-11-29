<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use App\Models\User;
use App\Models\Profile;
use App\Models\Uploads;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Validator;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Access\AuthorizationException;
use Illuminate\Auth\Events\Verified;

class DaftarUserController extends Controller
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
	//         'username' => [
	//         	'required', 'string', 'min:6', 'max:255', 'unique:users'
	//         ],
	//         'email' => ['required', 'string', 'email', 'max:255', 'unique:users'],
	//         'password' => ['required', 'string', 'min:8', 'confirmed'],
	//       ]);

	//       $user = User::create([
	//         'username' => $request->username,
	//         'email' => $request->email,
	//         'password' => Hash::make($request->password),
	//         ]);
	    
	//     $user->assignRole('user');
	    
	//     $user->Profile()->save(new Profile);
	    
	//     $this->guard()->login($user);

	//     if ($response = $this->registered($request, $user)) {
 //            return $response;
 //        }

 //        return $request->wantsJson()
 //                    ? new JsonResponse([], 201)
 //                    : redirect()->route('home');

	    
	// }


 //    protected function registered(Request $request, $user)
 //    {
 //        if (! hash_equals((string) $request->route('id'), (string) $request->user()->getKey())) {
 //            throw new AuthorizationException;
 //        }

 //        if (! hash_equals((string) $request->route('hash'), sha1($request->user()->getEmailForVerification()))) {
 //            throw new AuthorizationException;
 //        }

 //        if ($request->user()->hasVerifiedEmail()) {
 //            return $request->wantsJson()
 //                        ? new JsonResponse([], 204)
 //                        : redirect($this->redirectPath());
 //        }

 //        if ($request->user()->markEmailAsVerified()) {
 //            event(new Verified($request->user()));
 //        }

 //        if ($response = $this->verified($request)) {
 //            return $response;
 //        }

 //        return $request->wantsJson()
 //                    ? new JsonResponse([], 204)
 //                    : redirect($this->redirectPath())->with('verified', true);
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
    	$user->assignRole('user');
	    $user->Profile()->save(new Profile);
	    $user->Uploads()->save(new Uploads);

	    $this->guard()->logout();
	    return redirect()->route('login')->with('success','Pendaftaran telah berhasil');
    }















}

