<?php

namespace App\Http\Controllers\frontend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
use App\Models\DaySchedule;
use App\Models\Faq;
use App\Models\ThemeOptions;
use Illuminate\Http\Request;

class FrontendController extends Controller {
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $dayschedules = DaySchedule::all();
        $courses      = Course::where('status', 1)->select('id', 'name', 'slug', 'overview', 'banner_image')->orderBy('created_at', 'DESC')->get();
        $banners      = Banner::all();
        $allFaqs      = Faq::where('status', 1)->get();
        $aboutHome    = About::firstOrFail();
        $themeoption  = ThemeOptions::firstOrFail();
        return view('frontend.index', compact('dayschedules', 'courses', 'banners', 'allFaqs', 'aboutHome', 'themeoption'));
    }

    public function allCourse() {
        $courses = Course::where('status', 1)->select('name', 'overview', 'slug', 'banner_image')->OrderBy('id', 'DESC')->get();
        return view('frontend.allcourse', compact('courses'));
    }

    public function viewCourse($slug) {
        $data = Course::where('slug', $slug)->first();
        return view('frontend.courseview', compact('data'));
    }

    public function about() {
        $about = About::firstOrFail();
        return view('frontend.about', compact('about'));
    }

    public function payment() {
        $courses = Course::where('status', 1)->select('id', 'name')->get();
        return view('frontend.payment', compact('courses'));
    }

    public function paymentCourse($id) {
        $paycourses = Course::where('id', $id)->select('id', 'name')->get();

        // foreach ($paycourses as $paycourse) {
        //     foreach (json_decode($paycourse->installments) as $installment) {
        //         echo "<option value='" . $installment . "'>" . $installment . "</option>";
        //     }
        // }

    }

    public function paymentStore(Request $request) {
        return $request;
    }

}
