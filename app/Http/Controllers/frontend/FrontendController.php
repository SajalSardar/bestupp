<?php

namespace App\Http\Controllers\frontend;

use App\Models\Course;
use App\Models\DaySchedule;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Teachereducation;
use App\Models\StudentRegistration;
use App\Models\TeacherRegistration;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Response;

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


    public function studentRegistrationView(){
        $dayschedules = DaySchedule::all();
        $courses = Course::where('status', 1)->select('id','name')->get();
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
        $courses = Course::where('status', 1)->select('id', 'name', 'installments')->get(); 
        return view('frontend.payment', compact('courses'));
    }
    public function paymentCourse($id){
       $paycourses = Course::where('id', $id)->select('id', 'name', 'installments')->get();

       foreach($paycourses as $paycourse){
        foreach(json_decode($paycourse->installments) as $installment){
            echo "<option value='".$paycourse->id."'>".$installment."</option>";
        }
       }
       
       
    }


    public function studentRegistration(Request $request){
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


    public function teacheRegistrationView(){
        $courses = Course::where('status', 1)->select('id','name')->get();
        $edus = Teachereducation::all();
        return view('frontend.teacher_registration', compact('courses','edus'));
    }
    public function teacheRegistrationStore(Request $request){

        $nid   = $request->file('nid');
        $photo   = $request->file('photo');
        $certificate   = $request->file('certificate');

       $this->validate($request, [
            "name" => "required",
            "birthday" => "required",
            "mobile" => "required",
            "address" => "required",
            "national" => "required",
            "education" => "required",
            "father_name" => "required",
            "gender" => "required",
            "email" => "required",
            "parmanet_address" => "required",
            "course" => 'required',
            "university" => "required",
            "nid" => "required|mimes:jpeg,png,jpg,gif,pdf|max:500",
            "photo" => "required|mimes:jpeg,png,jpg,gif|max:500",
            "certificate" => "required|mimes:jpeg,png,jpg,pdf|max:500",
       ]);

       $_nid_name = Str::slug($request->name).'_'.time().'.'. $nid->getClientOriginalExtension();
        $nid_url   = URL::asset('storage/uploads/nids/' . $_nid_name);
        $nid_uploades = $nid->move(public_path('storage/uploads/nids/'), $_nid_name);
        
        $_photo_name = Str::slug($request->name).'_'.time().'.'. $photo->getClientOriginalExtension();
        $photo_url   = URL::asset('storage/uploads/profiles/' . $_photo_name);
        $photo_uploades = $photo->move(public_path('storage/uploads/profiles/'), $_photo_name); 

        $_certificate_name = Str::slug($request->name).'_'.time().'.'. $certificate->getClientOriginalExtension();
        $certificate_url   = URL::asset('storage/uploads/certificates/' . $_certificate_name);
        $certificate_uploades = $certificate->move(public_path('storage/uploads/certificates/'), $_certificate_name); 

       $data = new TeacherRegistration();
            $data->course_id = $request->course;
            $data->teachereducation_id = $request->education;
            $data->name = $request->name;
            $data->birthday = $request->birthday;
            $data->mobile = $request->mobile;
            $data->address = $request->address;
            $data->national = $request->national;
            $data->father_name = $request->father_name;
            $data->gender = $request->gender;
            $data->email = $request->email;
            $data->parmanet_address = $request->parmanet_address;
            $data->university = $request->university;
            $data->nid = $nid_url;
            $data->photo = $photo_url;
            $data->certificate = $certificate_url;
            $data->save();

            return back()->with('success', "Teacher Registration Successfull!");

    }
}
