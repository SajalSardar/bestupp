<?php

namespace App\Http\Controllers\Api;

use Carbon\Carbon;
use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Hash;
use App\Models\EmailVerificationToken;

class AuthController extends Controller {

    //login
    public function login(Request $request) {
        $request->validate([
            'email'    => 'required',
            'password' => 'required',
        ]);

        //email check
        $user = User::where('email', $request->email)->with('roles')->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([

                'error'   => true,
                'message' => "Invalid User",

            ]);
        };
        $token    = $user->createToken('apptoken')->plainTextToken;
        $response = [
            'user'  => $user,
            'token' => $token,
            'error' => false,
        ];

        return response($response, 201);

    }

    //log out
    public function logout(Request $request) {
        auth()->user()->tokens()->delete();

        return [
            'message' => 'Logout Success!',
        ];

    }

    //reset user
    public function updateProfile(Request $request) {
        $userdata = User::find(auth()->user()->id);
        $this->validate($request, [
            'name'  => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . $userdata->id,
        ]);

        $userdata->name  = $request->name;
        $userdata->email = $request->email;
        if ($request->password) {
            $userdata->password = Hash::make($request->password);
        }
        $userdata->save();

        return response($userdata, 201);
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
        return response([
            'message' => 'Email Verification Successfully Done!',
        ]);

       }else{
        return response([
            'message' => 'Invalid Verification Code!',
        ]);
       }

    }

}
