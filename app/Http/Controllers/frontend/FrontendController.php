<?php

namespace App\Http\Controllers\frontend;

use App\Models\Course;
use App\Models\DaySchedule;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Models\StudentRegistration;

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

    public function teacheRegistrationView(){
        return view('frontend.teacher_registration');
    }

    public function studentRegistrationView(){
        $dayschedules = DaySchedule::all();
        $courses = Course::all();
        return view('frontend.student_registration',compact('dayschedules','courses'));
    }

    public function allCourse(){
        $courses = Course::where('status', 1)->select('name', 'overview','slug')->OrderBy('id', 'DESC')->get();
        return view('frontend.allcourse', compact('courses'));
    }

    public function viewCourse($slug){
        $data = Course::where('slug', $slug)->first();
        return view('frontend.courseview', compact('data'));
    }

    public function about(){
        return view('frontend.about');
    }
    public function contact(){
        return view('frontend.contact');
    }
    public function payment(){
        return view('frontend.payment');
    }


    function studentRegistration(Request $request){
        $this->validate($request,[
            "name" => 'required',
            "birthday" => 'required',
            "course" => 'required',
            "mobile" => 'required',
            "nationality" => 'required',
            "fathername" => 'required',
            "gender" => 'required',
            "address" => 'required',
            "stime" => 'required',
        ]);

        $data = new StudentRegistration();
        $data->name = $request->name;
        $data->course_id = $request->course;
        $data->birthday = $request->birthday;
        $data->mobile = $request->mobile;
        $data->studentDay = $request->studentDay;
        $data->nationality = $request->nationality;
        $data->guardianname = $request->guardianname;
        $data->fathername = $request->fathername;
        $data->gender = $request->gender;
        $data->address = $request->address;
        $data->stime = $request->stime;
        $data->gnumber = $request->gnumber;
        $data->save();
        return back()->with("success", "Student Registration Successfull!");
    }
}
