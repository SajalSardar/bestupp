<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
use App\Models\DaySchedule;
use App\Models\Faq;
use App\Models\PrivacyPolicy;
use App\Models\ThemeOptions;

class FrontendController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $courses     = Course::where('status', 1)->select('id', 'name', 'slug', 'overview', 'banner_image')->orderBy('created_at', 'DESC')->get();
        $banners     = Banner::all();
        $allFaqs     = Faq::where('status', 1)->get();
        $aboutHome   = About::firstOrFail();
        $themeoption = ThemeOptions::firstOrFail();
        return view('frontend.index', compact('courses', 'banners', 'allFaqs', 'aboutHome', 'themeoption'));
    }

    public function allCourse() {
        $courses = Course::where('status', 1)->select('name', 'overview', 'slug', 'banner_image')->get();
        return view('frontend.allcourse', compact('courses'));
    }

    public function viewCourse($slug) {
        $data = Course::where('slug', $slug)->first();
        $days = DaySchedule::all();
        // return $data->class_days;
        // $day_arr = [];
        // foreach ($days as $day) {
        //     $exarr      = explode('-', $day->name);
        //     $day_length = count($exarr);
        //     $day_arr[]  = $day_length;
        // }
        // $a = array_diff($data->class_days, $day_arr);
        // return $a;

        return view('frontend.courseview', compact('data', 'days'));
    }

    public function about() {
        $about = About::firstOrFail();
        return view('frontend.about', compact('about'));
    }
    public function policy() {
        $policy = PrivacyPolicy::firstOrFail();
        return view('frontend.policy', compact('policy'));
    }

}
