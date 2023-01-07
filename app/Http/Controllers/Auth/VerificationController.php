<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Services\SendSMS;
use Illuminate\Http\Request;
use App\Models\VerificationCode;
use App\Events\ResetPasswordEvent;
use App\Http\Controllers\Controller;
use App\Models\EmailVerificationToken;
use App\Providers\RouteServiceProvider;
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
        $user = auth()->user();
        if($user->email){
            $request->user()->sendEmailVerificationNotification();
            return redirect()->back()->with('success', "Code Send Successfull!");
        }

        if($user->phone){
            $otpModel = VerificationCode::updateOrCreate([
                'user_id' => $user->id,
            ],[
                'otp' => $this->generateUniqueOtp()
            ]);
            $message = "Your Verification OTP is " .$otpModel->otp;
            (new SendSMS())->send_sms($user->phone, $message);

            return redirect()->back()->with('success', "Code Send Successfull!");
        }
    }

    private function generateUniqueOtp(): int
    {
        do {
            $otp = mt_rand(123400, 999999);
        } while (VerificationCode::where('otp', $otp)->exists());

        return $otp;
    }

    public function submitForm(){
        return view('auth.verifysubmit');
    }
    public function submitToken(Request $request){
        $request->validate([
            'verify_token' => 'required',
        ]);
        $user = auth()->user();
        if($user->email){
            $data = EmailVerificationToken::where('user_id',$user->id)->first();
            if($request->verify_token ===  $data->token){

                User::where('id', $data->user_id)->update([
                    "email_verified_at"=> Carbon::now(),
                ]);
                $data->delete();
                return redirect(route('frontend.home'))->with('success', "Email Verification Successfully Done!");
            }
        }
        if($user->phone){
            $hasOtp = $user->verificationOTP;
            if($hasOtp && $hasOtp->otp == $request->verify_token){
                $user->update([
                    "email_verified_at"=> Carbon::now(),
                    'phone_verified_at' => now()
                ]);

                $hasOtp->delete();

                return redirect(route('frontend.home'))->with('success', "Phone Verification Successfully Done!");
            }
        }

        return "<h2>Invalid Verification Code!<h2>";
    }
}
