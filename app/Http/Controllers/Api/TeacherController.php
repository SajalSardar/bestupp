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
        $insertUser->assignRole(2);

        $token    = $insertUser->createToken('apptoken')->plainTextToken;
        $response = [
            'user'  => $insertUser,
            'token' => $token,
        ];

        return response($response, 201);
    }

    public function teacherProfile() {
        $teacherProfile = User::where('id', auth()->user()->id)->with('teacher')->first();
        return response($teacherProfile, 201);
    }

    public function teacherUpdate(Request $request) {
        $user = Auth::user();

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
            "photo "           => "required",
            "nid"              => "required",
            "certificate"      => "required",
        ]);

        $courses    = explode(',', $request->courses);
        $educations = explode(',', $request->education);

        if (!empty($request->nid)) {
            $nid       = base64_decode($request->nid);
            $_nid_name = Str::slug($user->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/nids/') . $_nid_name, $nid);

            $path = public_path('storage/uploads/nids/' . $user->teacher->nid);
            if (file_exists($path) && $user->teacher->profile_photo != null) {
                unlink($path);
            }
        } else {
            $_nid_name = $user->teacher->nid;
        }

        if (!empty($request->photo)) {
            $photo       = base64_decode($request->photo);
            $_photo_name = Str::slug($user->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/profiles/') . $_photo_name, $photo);
            $path = public_path('storage/uploads/profiles/' . $user->teacher->photo);
            if (file_exists($path) && $user->teacher->profile_photo != null) {
                unlink($path);
            }
        } else {
            $_photo_name = $user->teacher->photo;
        }

        if (!empty($request->certificate)) {
            $certificate       = base64_decode($request->certificate);
            $_certificate_name = Str::slug($user->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/certificates/') . $_certificate_name, $certificate);
            $path = public_path('storage/uploads/certificates/' . $user->teacher->certificate);
            if (file_exists($path) && $user->teacher->profile_photo != null) {
                unlink($path);
            }
        } else {
            $_certificate_name = $user->teacher->certificate;
        }
        $teacherInformation = TeacherRegistration::updateOrCreate([
            'user_id' => $user->id,
        ], [
            "courses"           => json_encode($courses),
            "teachereducations" => json_encode($educations),
            "birthday "         => $request->birthday,
            "mobile"            => $request->mobile,
            "national"          => $request->nationality,
            "father_name"       => $request->fathername,
            "gender "           => $request->gender,
            "address"           => $request->address,
            "parmanet_address"  => $request->parmanet_address,
            "university"        => $request->university,
            "photo "            => $_photo_name,
            "nid"               => $_nid_name,
            "certificate"       => $_certificate_name,
        ]);

        return response($teacherInformation, 201);
    }

}
