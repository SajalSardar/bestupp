<?php

namespace App\Http\Controllers\Auth;

use Carbon\Carbon;
use App\Models\User;
use App\Services\SendSMS;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PasswordReset;
use App\Events\ResetPasswordEvent;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\ResetsPasswords;

class ResetPasswordController extends Controller
{

    use ResetsPasswords;

    /**
     * Where to redirect users after resetting their password.
     *
     * @var string
     */
    protected $redirectTo = RouteServiceProvider::HOME;

    public function resetPassword(Request $request)
    {
        $username = $this->userName($request->username);
        $request['phone'] = $username['phone'];
        $request['email'] = $username['email'];

        $request->validate([
            'username' => 'required',
            'email' => 'nullable|exists:users,email',
            'phone' => 'nullable|exists:users,phone',
        ]);


        if($username['email']){
            $token = Str::random(60);
            $reset =  $this->createOrFindEmail($username['email'], $token);

            ResetPasswordEvent::dispatch($username['email'], $reset->token);

            return back()->with('status', 'Please check your email for reset password link');
        }

        if($username['phone']){
            $otp = $this->generateUniqueOtp();
            $this->createOrFindPhone($username['phone'], $otp);
            $message = "Hello! \r\nYour Password Reset is \r\nOPT: " . $otp;
            (new SendSMS())->send_sms($username['phone'], $message);
            return redirect()->route('reset.password.phone', $username['phone']);
        }

    }

    public function phonePasswordReset($phone)
    {
        return view('auth.passwords.phone-reset', compact('phone'));
    }

    public function passwordUpdatePhone(Request $request)
    {
        $request->validate([
            'otp' => 'required|exists:password_resets,token',
            'phone' => 'required|exists:password_resets,phone',
            'password' => 'required|min:8|confirmed'
        ]);

        $data = PasswordReset::where('phone', $request->phone)->first();


        $user = User::where('phone', $request->phone)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        $data->delete();
        return redirect()->route('login');
    }

    private function createOrFindEmail($email, $token)
    {
        $exists = PasswordReset::where('email', $email)->first();
        if($exists){
            $exists->update([
                'token' => $token,
            ]);
        }else{
            $exists = PasswordReset::create([
                'email' => $email,
                'token' => $token
            ]);
        }
        return $exists;
    }

    private function createOrFindPhone($phone, $otp)
    {
        $exists = PasswordReset::where('phone', $phone)->first();
        if($exists){
            $exists->update([
                'token' => $otp,
            ]);
        }else{
            $exists = PasswordReset::create([
                'phone' => $phone,
                'token' => $otp
            ]);
        }
        return $exists;
    }

    private function generateUniqueOtp(): int
    {
        do {
            $otp = mt_rand(123400, 999999);
        } while (PasswordReset::where('token', $otp)->exists());

        return $otp;
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

    public function passwordUpdate(Request $request)
    {
        $request->validate([
            'token' => 'required|exists:password_resets,token',
            'email' => 'required|exists:password_resets,email',
            'password' => 'required|min:8|confirmed'
        ]);

        $data = PasswordReset::where('email', $request->email)->first();

        $user = User::where('email', $request->email)->first();
        $user->update([
            'password' => Hash::make($request->password)
        ]);
        $data->delete();
        return redirect()->route('login');
    }

}
