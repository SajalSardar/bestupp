<?php

namespace App\Http\Controllers\frontend;

use App\Models\Course;
use App\Models\DaySchedule;
use App\Models\TimeSchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class FrontendController extends Controller
{
    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        $dayschedules = DaySchedule::all();
        $courses = Course::all();
        return view('frontend.index', compact('dayschedules','courses'));
    }
}
