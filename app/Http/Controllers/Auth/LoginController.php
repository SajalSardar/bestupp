<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;

class LoginController extends Controller {


    public function login(Request $request)
    {

        $username = $this->userName($request->username);
        $request['phone'] = $username['phone'];
        $request['email'] = $username['email'];

        $request->validate([
            'username' => 'required',
            'email' => 'nullable|email|exists:users,email',
            'phone' => 'nullable|exists:users,phone',
        ]);

        if($username['email']){
            $credentials = $request->only('email', 'password');
        }else{
            $credentials = $request->only('phone', 'password');
        }

        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

    }

    private function userName($username)
    {
        if(filter_var($username, FILTER_VALIDATE_EMAIL)){
            return [
                'email' => $username,
                'phone' => null,
            ];
        }else {
            return [
                'email' => null,
                'phone' => $username
            ];
        }
    }
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
     * @//var string
     */
    //protected $redirectTo = RouteServiceProvider::HOME;

    protected function authenticated(Request $request, $user)
    {
        if ( $user->hasRole('student') ) {
            return redirect()->route('frontend.home');
        }

        return redirect('/dashboard');
    }


    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('guest')->except('logout');
    }
}
