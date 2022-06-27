<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\CheckPhoto;
use App\Models\TeacherRegistration;
use Illuminate\Http\Request;

class TeacherController extends Controller {
    public function teacherRegistration(Request $request) {
        $folder_path = public_path('storage/uploads/profiles/');
        $photo       = base64_decode($request->photo);
        $fileNamedb  = uniqid() . '.' . 'jpg';
        $fileName    = $folder_path . uniqid() . '.' . 'jpg';

        //Storage::disk('public')->put('uploads/profiles/' . $fileName, $photo);
        file_put_contents($fileName, $photo);

        $data        = new CheckPhoto();
        $data->photo = $fileNamedb;
        $data->save();
        return response($data, 201);

        // //print_r($photo);

        // return response("ok");

        // $base64Image  = explode(";base64,", $encode);
        // $explodeImage = explode("image/", $base64Image[0]);
        // $imageEx      = $explodeImage[1];

        // $image_base64 = base64_decode($base64Image[1]);
        // $fileName     = uniqid() . '. ' . $imageEx;

        // $_nid_name = Str::slug($request->name) . '_bs64' . time() . '.' . 'jpg';
        //Storage::disk('public')->put('uploads/nids/' . $fileName, $encode);

        // $this->validate($request, [
        //     'name'             => ['required', 'string', 'max:255'],
        //     'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
        //     'password'         => ['required', 'string', 'min:8'],
        //     "birthday"         => "required",
        //     "mobile"           => "required",
        //     "address"          => "required",
        //     "national"         => "required",
        //     "education"        => "required",
        //     "father_name"      => "required",
        //     "gender"           => "required",
        //     "parmanet_address" => "required",
        //     "courses"          => 'required',
        //     "university"       => "required",
        //     "nid"              => "required|mimes:jpeg,png,jpg,gif,pdf|max:500",
        //     "photo"            => "required|mimes:jpeg,png,jpg,gif|max:500",
        //     "certificate"      => "required|mimes:jpeg,png,jpg,pdf|max:500",
        // ]);

        // $_nid_name    = Str::slug($request->name) . '_' . time() . '.' . $nid->getClientOriginalExtension();
        // $nid_uploades = $nid->move(public_path('storage/uploads/nids/'), $_nid_name);

        // $_photo_name    = Str::slug($request->name) . '_' . time() . '.' . $photo->getClientOriginalExtension();
        // $photo_uploades = $photo->move(public_path('storage/uploads/profiles/'), $_photo_name);

        // $_certificate_name    = Str::slug($request->name) . '_' . time() . '.' . $certificate->getClientOriginalExtension();
        // $certificate_uploades = $certificate->move(public_path('storage/uploads/certificates/'), $_certificate_name);

        // $insertUser                    = new User();
        // $insertUser->name              = $request->name;
        // $insertUser->email             = $request->email;
        // $insertUser->password          = Hash::make($request->password);
        // $insertUser->email_verified_at = now();
        // $insertUser->save();
        // $insertUser->assignRole(2);

        // if ($insertUser->id) {
        //     $data                    = new TeacherRegistration();
        //     $data->user_id           = $insertUser->id;
        //     $data->courses           = json_encode($request->courses);
        //     $data->teachereducations = json_encode($request->education);
        //     $data->birthday          = $request->birthday;
        //     $data->mobile            = $request->mobile;
        //     $data->address           = $request->address;
        //     $data->national          = $request->national;
        //     $data->father_name       = $request->father_name;
        //     $data->gender            = $request->gender;
        //     $data->parmanet_address  = $request->parmanet_address;
        //     $data->university        = $request->university;
        //     $data->nid               = $_nid_name;
        //     $data->photo             = $_photo_name;
        //     $data->certificate       = $_certificate_name;
        //     $data->save();
        // }

        // $token    = $insertUser->createToken('apptoken')->plainTextToken;
        // $response = [
        //     'user'  => $insertUser,
        //     'token' => $token,
        // ];

        //return response($response, 201);
    }
}
