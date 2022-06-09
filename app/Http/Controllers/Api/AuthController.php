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
        $user = User::where('email', $request->email)->with('roles', 'notices')->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response([
                'user' => [
                    'error'   => true,
                    'message' => "Invalid User",
                ],

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
}
