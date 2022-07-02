<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\TeacherRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class TeacherController extends Controller {
    public function teacherRegistration(Request $request) {

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
            "nid"              => "required",
            "photo"            => "required",
            "certificate"      => "required",
        ]);

        $courses    = explode(',', $request->courses);
        $educations = explode(',', $request->education);

        $nid       = base64_decode($request->nid);
        $_nid_name = Str::slug($request->name) . '_' . time() . '.' . 'jpg';
        file_put_contents(public_path('storage/uploads/nids/') . $_nid_name, $nid);

        $photo       = base64_decode($request->photo);
        $_photo_name = Str::slug($request->name) . '_' . time() . '.' . 'jpg';
        file_put_contents(public_path('storage/uploads/profiles/') . $_photo_name, $photo);

        $certificate       = base64_decode($request->certificate);
        $_certificate_name = Str::slug($request->name) . '_' . time() . '.' . 'jpg';
        file_put_contents(public_path('storage/uploads/certificates/') . $_certificate_name, $certificate);

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
            $data->courses           = json_encode($courses);
            $data->teachereducations = json_encode($educations);
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

    public function teacherProfile() {
        $teacherProfile = Auth::user()->teacher;
        return response($teacherProfile, 201);
    }

    public function teacherUpdate(Request $request, $id) {
        $data = TeacherRegistration::find($id);

        $this->validate($request, [
            "birthday"         => "required",
            "mobile"           => "required",
            "address"          => "required",
            "education"        => "required",
            "courses"          => "required",
            "nationality"      => "required",
            "fathername"       => "required",
            "gender"           => "required",
            "parmanet_address" => "required",
            "university"       => "required",
        ]);

        $courses    = explode(',', $request->courses);
        $educations = explode(',', $request->education);

        if (!empty($request->nid)) {
            $nid       = base64_decode($request->nid);
            $_nid_name = Str::slug($request->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/nids/') . $_nid_name, $nid);

            $path = public_path('storage/uploads/nids/' . $data->nid);
            if (file_exists($path)) {
                unlink($path);
            }
        } else {
            $_nid_name = $data->nid;
        }

        if (!empty($request->photo)) {
            $photo       = base64_decode($request->photo);
            $_photo_name = Str::slug($request->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/profiles/') . $_photo_name, $photo);
            $path = public_path('storage/uploads/profiles/' . $data->photo);
            if (file_exists($path)) {
                unlink($path);
            }
        } else {
            $_photo_name = $data->photo;
        }

        if (!empty($request->certificate)) {
            $certificate       = base64_decode($request->certificate);
            $_certificate_name = Str::slug($request->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/certificates/') . $_certificate_name, $certificate);
            $path = public_path('storage/uploads/certificates/' . $data->certificate);
            if (file_exists($path)) {
                unlink($path);
            }
        } else {
            $_certificate_name = $data->certificate;
        }

        $data->courses           = json_encode($courses);
        $data->teachereducations = json_encode($educations);
        $data->birthday          = $request->birthday;
        $data->mobile            = $request->mobile;
        $data->national          = $request->nationality;
        $data->father_name       = $request->fathername;
        $data->gender            = $request->gender;
        $data->address           = $request->address;
        $data->parmanet_address  = $request->parmanet_address;
        $data->university        = $request->university;
        $data->photo             = $_photo_name;
        $data->nid               = $_nid_name;
        $data->certificate       = $_certificate_name;

        $data->save();
        return response($data, 201);
    }

}
