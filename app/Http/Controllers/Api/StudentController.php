<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\StudentRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller {
    public function studentRegistration(Request $request) {
        $this->validate($request, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);

        $insertUser = User::create([
            "name"              => $request->name,
            "email"             => $request->email,
            "password"          => Hash::make($request->password),
            "email_verified_at" => now(),
        ]);
        $insertUser->assignRole(3);

        $token    = $insertUser->createToken('apptoken')->plainTextToken;
        $response = [
            'user'  => $insertUser,
            'token' => $token,
        ];

        return response($response, 201);

    }

    public function showOrders() {
        $ourOrders = Order::where('user_id', auth()->user()->id)->with('OrderInstallments', 'course')->OrderBy('created_at', 'DESC')->get();
        return response($ourOrders, 201);
    }

    public function studentProfile() {
        $studentProfile = User::where('id', auth()->user()->id)->with('student')->first();
        return response($studentProfile, 201);
    }

    public function studentUpdate(Request $request) {
        $photo = base64_decode($request->profile_photo);

        $user = Auth::user();
        $this->validate($request, [
            "birthday"    => 'required',
            "mobile"      => 'required',
            "nationality" => 'required',
            "fathername"  => 'required',
            "gender"      => 'required',
            "address"     => 'required',
        ]);

        if ($photo) {

            // if ($user->student->profile_photo) {
            //     $path = public_path('storage/uploads/profiles/' . $user->student->profile_photo);
            //     if (file_exists($path)) {
            //         unlink($path);
            //     }
            // }

            $_photo_name = Str::slug($user->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/profiles/') . $_photo_name, $photo);

        } else {
            $_photo_name = $user->student->profile_photo;
        }

        $studentInformation = StudentRegistration::updateOrCreate([
            'user_id' => $user->id,
        ], [
            "birthday"      => $request->birthday,
            "mobile"        => $request->mobile,
            "nationality"   => $request->nationality,
            "guardianname"  => $request->guardianname,
            "fathername"    => $request->fathername,
            "gender"        => $request->gender,
            "address"       => $request->address,
            "gnumber"       => $request->gnumber,
            "profile_photo" => $_photo_name,
        ]);

        return response($studentInformation, 201);
    }

}
