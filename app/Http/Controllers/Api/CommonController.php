<?php

namespace App\Http\Controllers\Api;

use App\Models\About;
use App\Models\Offer;
use App\Models\Banner;
use App\Models\Notice;
use App\Models\Contact;
use App\Models\DaySchedule;
use App\Models\FreeLearning;
use App\Models\ReturnPolicy;
use App\Models\ThemeOptions;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\SocialNetwork;
use App\Models\TermsCondition;
use App\Models\AboutPageContent;
use App\Models\Teachereducation;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class CommonController extends Controller {
    public function allBanners() {
        $banners = Banner::where('status', 1)->get();
        return response($banners, 201);
    }
    public function aboutUs() {
        $about = About::where('id', 1)->get();
        return response($about, 201);
    }
    public function aboutContent() {
        $aboutData = AboutPageContent::all();
        return response($aboutData, 201);
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

    public function courseDay() {
        $data = DaySchedule::all();
        return response($data, 200);
    }

    public function teacherEducation() {
        $data = Teachereducation::all();
        return response($data, 200);
    }
    public function socialNetwork() {
        $data = SocialNetwork::all();
        return response($data, 200);
    }

    public function themeOption() {
        $data = ThemeOptions::where('id', 1)->get();
        return response($data, 200);
    }

    public function privacyPolicy() {
        $data = PrivacyPolicy::orderBy('id', 'asc')->get();
        return response($data, 200);
    }

    public function notice() {
        $data = Auth::user()->notices;
        return response($data, 200);
    }
    
    function studentNoticeView(Notice $notice){
        $notice->status = 2;
        $notice->save();
        return response([
            "message" => 'Notice update status successfull!',
        ]);
    }

    public function termsCondition() {
        $policy = TermsCondition::orderBy('id', 'asc')->get();
        return response($policy, 200);
    }
    public function returnRefund() {
        $returnPolicy = ReturnPolicy::first();
        return response($returnPolicy, 200);
    }
    public function offer() {
        $offer = Offer::where('status', 1)->orderBy('id', 'desc')->first();
        return response($offer, 201);
    }

}
