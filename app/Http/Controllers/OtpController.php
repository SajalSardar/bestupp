<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use App\Models\VerificationCode;
use App\Services\SendSMS;

class OtpController extends Controller
{
    public function sendOTP(Request $request)
    {
        $request->validate([
            'phone' => 'required|min:11'
        ]);

        $user = User::where('phone', $request->phone)->first();
        if(!$user){
            return response('Invalid Phone number');
        }
        $otpModel = VerificationCode::updateOrCreate([
            'user_id' => $user->id,
        ],[
            'otp' => $this->generateUniqueOtp()
        ]);
        $message = "Your Verification OTP is " .$otpModel->otp;
        (new SendSMS())->send_sms($request->phone, $message);

        return response('OTP send success');
    }

    public function verifyOTP(Request $request)
    {
        $request->validate([
            'otp' => 'required|min:6|max:6',
            'phone' => 'required|exists:users,phone',
        ]);

        $user = User::where('phone', $request->phone)->first();
        $hasOtp = $user->verificationOTP;

        if($hasOtp && $hasOtp->otp == $request->otp){
            $user->update([
                'phone_verified_at' => now()
            ]);

            $hasOtp->delete();

            return response('phone verification is complete');
        }

        return response('Invalid otp');
    }

    private function generateUniqueOtp(): int
    {
        do {
            $otp = mt_rand(123400, 999999);
        } while (VerificationCode::where('otp', $otp)->exists());

        return $otp;
    }
}
