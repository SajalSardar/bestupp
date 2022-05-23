<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Contact;
use App\Models\FreeLearning;
use Illuminate\Http\Request;

class CommonController extends Controller {
    public function allBanners() {
        $banners = Banner::all();
        return response($banners, 201);
    }
    public function aboutUs() {
        $about = About::first();
        return response($about, 201);
    }

    public function freeLearning(Request $request) {
        $this->validate($request, [
            "course_id" => "required",
            "name"      => "required",
            "email"     => "required",
            "mobile"    => "required",
        ]);

        $data            = new FreeLearning();
        $data->course_id = $request->course_id;
        $data->name      = $request->name;
        $data->email     = $request->email;
        $data->mobile    = $request->mobile;
        $data->address   = $request->address;
        $data->save();
        $response = [
            'freeLearning' => $data,
            'message'      => "Send Message Successfull!",
        ];
        return response($response, 201);
    }
    public function contactUs(Request $request) {
        $this->validate($request, [
            "name"    => 'required',
            "mobile"  => 'required',
            "email"   => 'required',
            "message" => 'required',
        ]);

        $data            = new Contact();
        $data->full_name = $request->name;
        $data->mobile    = $request->mobile;
        $data->email     = $request->email;
        $data->message   = $request->message;
        $data->status    = 1;
        $data->save();
        $response = [
            'contactUs' => $data,
            'message'   => "Send Message Successfull!",
        ];
        return response($response, 201);
    }
}
