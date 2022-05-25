<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeacherRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller {
    public function teacherRegistration(Request $request) {

        $nid         = $request->file('nid');
        $photo       = $request->file('photo');
        $certificate = $request->file('certificate');

        $this->validate($request, [
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'         => ['required', 'string', 'min:8'],
            "birthday"         => "required",
            "mobile"           => "required",
            "address"          => "required",
            "national"         => "required",
            "education"        => "required",
            "father_name"      => "required",
            "gender"           => "required",
            "parmanet_address" => "required",
            "courses"          => 'required',
            "university"       => "required",
            "nid"              => "required|mimes:jpeg,png,jpg,gif,pdf|max:500",
            "photo"            => "required|mimes:jpeg,png,jpg,gif|max:500",
            "certificate"      => "required|mimes:jpeg,png,jpg,pdf|max:500",
        ]);

        $_nid_name    = Str::slug($request->name) . '_' . time() . '.' . $nid->getClientOriginalExtension();
        $nid_uploades = $nid->move(public_path('storage/uploads/nids/'), $_nid_name);

        $_photo_name    = Str::slug($request->name) . '_' . time() . '.' . $photo->getClientOriginalExtension();
        $photo_uploades = $photo->move(public_path('storage/uploads/profiles/'), $_photo_name);

        $_certificate_name    = Str::slug($request->name) . '_' . time() . '.' . $certificate->getClientOriginalExtension();
        $certificate_uploades = $certificate->move(public_path('storage/uploads/certificates/'), $_certificate_name);

        $insertUser                    = new User();
        $insertUser->name              = $request->name;
        $insertUser->email             = $request->email;
        $insertUser->password          = Hash::make($request->password);
        $insertUser->email_verified_at = now();
        $insertUser->save();
        $insertUser->assignRole(2);

        if ($insertUser->id) {
            $data                    = new TeacherRegistration();
            $data->user_id           = $insertUser->id;
            $data->courses           = json_encode($request->courses);
            $data->teachereducations = json_encode($request->education);
            $data->birthday          = $request->birthday;
            $data->mobile            = $request->mobile;
            $data->address           = $request->address;
            $data->national          = $request->national;
            $data->father_name       = $request->father_name;
            $data->gender            = $request->gender;
            $data->parmanet_address  = $request->parmanet_address;
            $data->university        = $request->university;
            $data->nid               = $_nid_name;
            $data->photo             = $_photo_name;
            $data->certificate       = $_certificate_name;
            $data->save();
        }

        $token    = $insertUser->createToken('apptoken')->plainTextToken;
        $response = [
            'user'  => $insertUser,
            'token' => $token,
        ];

        return response($response, 201);
    }
}