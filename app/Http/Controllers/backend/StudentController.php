<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Course;
use App\Models\DaySchedule;
use App\Models\StudentRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;

class StudentController extends Controller {

    public function studentRegistrationView() {
        $dayschedules = DaySchedule::all();
        $courses      = Course::where('status', 1)->select('id', 'name')->get();
        return view('frontend.student_registration', compact('dayschedules', 'courses'));
    }

    public function studentRegistration(Request $request) {
        $this->validate($request, [
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:8'],
            "birthday"    => 'required',
            "course"      => 'required',
            "mobile"      => 'required',
            "nationality" => 'required',
            "fathername"  => 'required',
            "gender"      => 'required',
            "address"     => 'required',
            "stime"       => 'required',
            "studentDay"  => 'required',
        ]);
        $insertUser           = new User();
        $insertUser->name     = $request->name;
        $insertUser->email    = $request->email;
        $insertUser->password = Hash::make($request->password);
        $insertUser->save();
        $insertUser->assignRole(4);

        if ($insertUser) {
            $data               = new StudentRegistration();
            $data->user_id      = $insertUser->id;
            $data->birthday     = $request->birthday;
            $data->mobile       = $request->mobile;
            $data->nationality  = $request->nationality;
            $data->guardianname = $request->guardianname;
            $data->fathername   = $request->fathername;
            $data->gender       = $request->gender;
            $data->address      = $request->address;
            $data->gnumber      = $request->gnumber;
            $data->save();

        }
        if ($insertUser) {
            $cartData                = new Cart();
            $cartData->user_id       = $insertUser->id;
            $cartData->course_id     = $request->course;
            $cartData->day_schedule  = $request->studentDay;
            $cartData->time_schedule = $request->stime;
            $cartData->save();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('cart')
                ->with("success", "Registration Successfull!");
        }
    }

    function showAll() {
        $students = StudentRegistration::with('user')->OrderBy('created_at', 'DESC')->get();
        return view('backend.student.index', compact('students'));
    }

}
