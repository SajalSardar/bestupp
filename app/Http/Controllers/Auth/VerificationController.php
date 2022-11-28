<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\EmailVerificationToken;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
use Illuminate\Foundation\Auth\VerifiesEmails;

class VerificationController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Email Verification Controller
    |--------------------------------------------------------------------------
    |
    | This controller is responsible for handling email verification for any
    | user that recently registered with the application. Emails may also
    | be re-sent if the user didn't receive the original email message.
    |
    */

    use VerifiesEmails;

    /**
     * Where to redirect users after verification.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
        $this->middleware('signed')->only('verify');
        $this->middleware('throttle:6,1')->only('verify', 'resend');
    }

    public function resend(Request $request){
        $request->user()->sendEmailVerificationNotification();
        return redirect()->back()->with('success', "Code Send Successfull!");
    }
    public function submitForm(){
        return view('auth.verifysubmit');
    }
    public function submitToken(Request $request){
        $request->validate([
            'verify_token' => 'required',
        ]);

    
       $data = EmailVerificationToken::where('user_id',auth()->user()->id)->first();
       

       if($request->verify_token ===  $data->token){
        
        User::where('id', $data->user_id)->update([
            "email_verified_at"=> Carbon::now(),
        ]);
        $data->delete();
        return redirect(route('frontend.home'))->with('success', "Email Verification Successfully Done!");

       }else{
        return "<h2>Invalid Verification Code!<h2>";
       }

        
        
    }
}
