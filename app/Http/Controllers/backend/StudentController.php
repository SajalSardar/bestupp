<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\StudentRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class StudentController extends Controller {

    public function studentRegistrationView() {
        return view('frontend.student_registration');
    }

    public function studentRegistration(Request $request) {
        $this->validate($request, [
            'name'        => ['required', 'string', 'max:255'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:8'],
            "birthday"    => 'required',
            "mobile"      => 'required',
            "nationality" => 'required',
            "fathername"  => 'required',
            "gender"      => 'required',
            "address"     => 'required',
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

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->route('dashboard')
                ->with("success", "Registration Successfull!");
        }
    }

    function showAll() {
        $students = StudentRegistration::with('user')->OrderBy('created_at', 'DESC')->get();
        return view('backend.student.index', compact('students'));
    }

    function showOrders() {
        $ourOrders = Order::where('user_id', auth()->user()->id)->with('order_installments', 'course')->OrderBy('created_at', 'DESC')->get();
        return view('backend.student.ourorder', compact('ourOrders'));
    }

    function studentInformationEdit() {
        $information = StudentRegistration::where('user_id', auth()->user()->id)->first();
        return view('backend.student.edit', compact('information'));
    }

    function studentInformationUpdate(Request $request, $id) {

        $profile_photo = $request->file('profile_photo');
        $data          = StudentRegistration::find($id);

        $this->validate($request, [
            "birthday"      => 'required',
            "mobile"        => 'required',
            "nationality"   => 'required',
            "fathername"    => 'required',
            "gender"        => 'required',
            "address"       => 'required',
            'profile_photo' => 'mimes:jpeg,jpg,png|max:200',
        ]);

        if (!empty($profile_photo)) {
            $_photo_name = Str::slug($data->user->name) . '_' . time() . '.' . $profile_photo->getClientOriginalExtension();

            $profile_photo->move(public_path('storage/uploads/profiles/'), $_photo_name);
            $path = public_path('storage/uploads/profiles/' . $data->profile_photo);
            if (file_exists($path) && $data->profile_photo != null) {
                unlink($path);
            }
        } else {
            $_photo_name = $data->profile_photo;
        }

        $data->birthday      = $request->birthday;
        $data->mobile        = $request->mobile;
        $data->nationality   = $request->nationality;
        $data->guardianname  = $request->guardianname;
        $data->fathername    = $request->fathername;
        $data->gender        = $request->gender;
        $data->address       = $request->address;
        $data->gnumber       = $request->gnumber;
        $data->profile_photo = $_photo_name;
        $data->save();

        return back()->with('success', "Information Update Successfull!");
    }

    function manageStudent($id) {
        $findStuden = StudentRegistration::find($id);

        return view('backend.student.view', compact('findStuden'));
    }

    function studentComplete($id) {
        $teacher         = StudentRegistration::find($id);
        $teacher->status = 3;
        $teacher->save();
        return back()->with('success', 'Course Completed!');
    }
    function studentDrop($id) {
        $teacher         = StudentRegistration::find($id);
        $teacher->status = 2;
        $teacher->save();
        return back()->with('success', 'Student Drop out!!');
    }
    function studentRunning($id) {
        $teacher         = StudentRegistration::find($id);
        $teacher->status = 1;
        $teacher->save();
        return back()->with('success', 'Student Running!!');
    }

}
