<?php

namespace App\Http\Controllers\frontend;

use App\Models\Faq;
use App\Models\About;
use App\Models\Banner;
use App\Models\Course;
use App\Models\DaySchedule;
use App\Models\ReturnPolicy;
use App\Models\ThemeOptions;
use App\Models\PrivacyPolicy;
use App\Models\TermsCondition;
use App\Models\AboutPageContent;
use App\Http\Controllers\Controller;
use App\Models\Offer;

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
        $offer = Offer::where('status', 1)->orderBy('id', 'desc')->first();
        return view('frontend.index', compact('courses', 'banners', 'allFaqs', 'aboutHome', 'themeoption','offer'));
    }

    public function allCourse() {
        $courses = Course::where('status', 1)->select('name', 'overview', 'slug', 'banner_image')->get();
        return view('frontend.allcourse', compact('courses'));
    }

    public function viewCourse($slug) {
        $data = Course::where('slug', $slug)->first();
        $days = DaySchedule::all();

        return view('frontend.courseview', compact('data', 'days'));
    }

    public function about() {
        $about            = About::firstOrFail();
        $about_page_first = AboutPageContent::first();
        $about_page       = AboutPageContent::offset(1)->limit(50)->get();
        return view('frontend.about', compact('about', 'about_page_first', 'about_page'));
    }
    public function policy() {
        $policy = PrivacyPolicy::orderBy('id', 'asc')->get();
        return view('frontend.policy', compact('policy'));
    }
    public function termsCondition() {
        $policy = TermsCondition::orderBy('id', 'asc')->get();
        return view('frontend.terms', compact('policy'));
    }
    public function returnRefund() {
        $returnPolicy = ReturnPolicy::first();
        return view('frontend.return', compact('returnPolicy'));
    }

}
