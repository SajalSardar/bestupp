<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

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
}
