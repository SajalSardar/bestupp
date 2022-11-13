<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\TeacherRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\EmailVerificationToken;

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
        ]);
        $insertUser->assignRole(2);

        $verifyToken = new EmailVerificationToken();
        $verifyToken->user_id = $insertUser->id;
        $verifyToken->token = random_int(100000, 999999);;
        $verifyToken->save();

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
        $nid         = base64_decode($request->nid);
        $photo       = base64_decode($request->photo);
        $certificate = base64_decode($request->certificate);

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
            "photo"            => "required",
            "nid"              => "required",
            "certificate"      => "required",
        ]);

        $courses    = explode(',', $request->courses);
        $educations = explode(',', $request->education);

        if ($nid) {
            if (!empty($user->teacher->profile_photo) && $user->teacher->profile_photo != null) {
                $path = public_path('storage/uploads/nids/' . $user->teacher->nid);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $_nid_name = Str::slug($user->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/nids/') . $_nid_name, $nid);

        } else {
            $_nid_name = $user->teacher->nid ?? null;
        }

        if ($photo) {
            if (!empty($user->teacher->profile_photo) && $user->teacher->profile_photo != null) {
                $path = public_path('storage/uploads/profiles/' . $user->teacher->photo);
                if (file_exists($path)) {
                    unlink($path);
                }
            }
            $_photo_name = Str::slug($user->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/profiles/') . $_photo_name, $photo);

        } else {
            $_photo_name = $user->teacher->photo ?? null;
        }

        if ($certificate) {
            if (!empty($user->teacher->profile_photo) && $user->teacher->profile_photo != null) {
                $path = public_path('storage/uploads/certificates/' . $user->teacher->certificate);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $_certificate_name = Str::slug($user->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/certificates/') . $_certificate_name, $certificate);

        } else {
            $_certificate_name = $user->teacher->certificate ?? null;
        }
        $teacherInformation = TeacherRegistration::updateOrCreate([
            'user_id' => $user->id,
        ], [
            "courses"           => json_encode($courses),
            "teachereducations" => json_encode($educations),
            "birthday"          => $request->birthday,
            "mobile"            => $request->mobile,
            "national"          => $request->nationality,
            "father_name"       => $request->fathername,
            "gender"            => $request->gender,
            "address"           => $request->address,
            "parmanet_address"  => $request->parmanet_address,
            "university"        => $request->university,
            "photo"             => $_photo_name,
            "nid"               => $_nid_name,
            "certificate"       => $_certificate_name,
        ]);

        return response($teacherInformation, 201);
    }

}
