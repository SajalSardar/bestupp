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
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:8'],
            "birthday"    => 'required',
            "mobile"      => 'required',
            "nationality" => 'required',
            "fathername"  => 'required',
            "gender"      => 'required',
            "address"     => 'required',
        ]);

        $insertUser = User::create([
            "name"              => $request->name,
            "email"             => $request->email,
            "password"          => Hash::make($request->password),
            "email_verified_at" => now(),
        ]);
        $insertUser->assignRole(3);

        $StudentData               = new StudentRegistration();
        $StudentData->user_id      = $insertUser->id;
        $StudentData->birthday     = $request->birthday;
        $StudentData->mobile       = $request->mobile;
        $StudentData->nationality  = $request->nationality;
        $StudentData->guardianname = $request->guardianname;
        $StudentData->fathername   = $request->fathername;
        $StudentData->gender       = $request->gender;
        $StudentData->address      = $request->address;
        $StudentData->gnumber      = $request->gnumber;
        $StudentData->save();

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

    function studentUpdate(Request $request, $id) {

        $profile_photo = $request->profile_photo;
        $data          = StudentRegistration::find($id);

        $this->validate($request, [
            "birthday"    => 'required',
            "mobile"      => 'required',
            "nationality" => 'required',
            "fathername"  => 'required',
            "gender"      => 'required',
            "address"     => 'required',
        ]);

        if (!empty($profile_photo)) {

            $photo       = base64_decode($request->profile_photo);
            $_photo_name = Str::slug($data->user->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/profiles/') . $_photo_name, $photo);

            $path = public_path('storage/uploads/profiles/' . $data->profile_photo);
            if (file_exists($path) && $data->profile_photo != null) {
                unlink($path);
            }
        } else {
            $_photo_name = $data->profile_photo;
        }

        $data->birthday      = $request->birthday;
        $data->mobile        = $request->mobile;
        $data->nationality   = $request->nationality;
        $data->guardianname  = $request->guardianname;
        $data->fathername    = $request->fathername;
        $data->gender        = $request->gender;
        $data->address       = $request->address;
        $data->gnumber       = $request->gnumber;
        $data->profile_photo = $_photo_name;
        $data->save();

        return response($data, 201);
    }

}
