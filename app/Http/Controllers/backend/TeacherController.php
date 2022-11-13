<?php

namespace App\Http\Controllers\backend;

use App\Models\User;
use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\Teachereducation;
use App\Models\TeacherRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\EmailVerificationToken;

class TeacherController extends Controller {
    public function teacheRegistrationView() {
        $courses = Course::where('status', 1)->select('id', 'name')->get();
        $edus    = Teachereducation::all();
        return view('frontend.teacher_registration', compact('courses', 'edus'));
    }
    public function teacheRegistrationStore(Request $request) {

        $nid         = $request->file('nid');
        $photo       = $request->file('photo');
        $certificate = $request->file('certificate');

        $this->validate($request, [
            'name'             => ['required', 'string', 'max:255'],
            'email'            => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'         => ['required', 'string', 'min:8'],
            "birthday"         => "required",
            "mobile"           => "required",
            "address"          => "required",
            "national"         => "required",
            "education"        => "required",
            "father_name"      => "required",
            "gender"           => "required",
            "parmanet_address" => "required",
            "courses"          => 'required',
            "university"       => "required",
            "nid"              => "required|mimes:jpeg,png,jpg,gif,pdf|max:500",
            "photo"            => "required|mimes:jpeg,png,jpg,gif|max:500",
            "certificate"      => "required|mimes:jpeg,png,jpg,pdf|max:500",
        ]);

        $_nid_name    = Str::slug($request->name) . '_' . time() . '.' . $nid->getClientOriginalExtension();
        $nid_uploades = $nid->move(public_path('storage/uploads/nids/'), $_nid_name);

        $_photo_name    = Str::slug($request->name) . '_' . time() . '.' . $photo->getClientOriginalExtension();
        $photo_uploades = $photo->move(public_path('storage/uploads/profiles/'), $_photo_name);

        $_certificate_name    = Str::slug($request->name) . '_' . time() . '.' . $certificate->getClientOriginalExtension();
        $certificate_uploades = $certificate->move(public_path('storage/uploads/certificates/'), $_certificate_name);

        $insertUser                    = new User();
        $insertUser->name              = $request->name;
        $insertUser->email             = $request->email;
        $insertUser->password          = Hash::make($request->password);
        $insertUser->save();
        $insertUser->assignRole(2);

        if ($insertUser->id) {
            $verifyToken = new EmailVerificationToken();
            $verifyToken->user_id = $insertUser->id;
            $verifyToken->token = random_int(100000, 999999);;
            $verifyToken->save();
            
            $data                    = new TeacherRegistration();
            $data->user_id           = $insertUser->id;
            $data->courses           = json_encode($request->courses);
            $data->teachereducations = json_encode($request->education);
            $data->birthday          = $request->birthday;
            $data->mobile            = $request->mobile;
            $data->address           = $request->address;
            $data->national          = $request->national;
            $data->father_name       = $request->father_name;
            $data->gender            = $request->gender;
            $data->parmanet_address  = $request->parmanet_address;
            $data->university        = $request->university;
            $data->nid               = $_nid_name;
            $data->photo             = $_photo_name;
            $data->certificate       = $_certificate_name;
            $data->save();
        }

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            return redirect()->intended('dashboard')
                ->withSuccess('You have Successfully loggedin');
        }

    }

    function showAll() {
        $teachers = User::role('teacher')->with('teacher')->orderBy('created_at', 'DESC')->get();
        return view('backend.teacher.index', compact('teachers'));
    }

    function teacherInformationEdit() {
        $information = TeacherRegistration::where('user_id', auth()->user()->id)->first();
        $courses     = Course::all();
        $tEducations = Teachereducation::all();
        return view('backend.teacher.edit', compact('information', 'courses', 'tEducations'));
    }

    function teacherInformationUpdate(Request $request, $id) {

        $data = TeacherRegistration::find($id);

        $nid         = $request->file('nid');
        $photo       = $request->file('photo');
        $certificate = $request->file('certificate');

        $this->validate($request, [
            "birthday"         => "required",
            "mobile"           => "required",
            "address"          => "required",
            "education"        => "required",
            "courses"          => "required",
            "nationality"      => "required",
            "fathername"       => "required",
            "gender"           => "required",
            "parmanet_address" => "required",
            "university"       => "required",
            "nid"              => "mimes:jpeg,png,jpg,gif,pdf|max:500",
            "photo"            => "mimes:jpeg,png,jpg,gif|max:500",
            "certificate"      => "mimes:jpeg,png,jpg,pdf|max:500",
        ]);

        if (!empty($nid)) {
            $_nid_name = Str::slug($request->name) . '_' . time() . '.' . $nid->getClientOriginalExtension();
            $nid->move(public_path('storage/uploads/nids/'), $_nid_name);
            $path = public_path('storage/uploads/nids/' . $data->nid);
            if (file_exists($path)) {
                unlink($path);
            }
        } else {
            $_nid_name = $data->nid;
        }

        if (!empty($photo)) {
            $_photo_name = Str::slug($request->name) . '_' . time() . '.' . $photo->getClientOriginalExtension();
            $photo->move(public_path('storage/uploads/profiles/'), $_photo_name);
            $path = public_path('storage/uploads/profiles/' . $data->photo);
            if (file_exists($path)) {
                unlink($path);
            }
        } else {
            $_photo_name = $data->photo;
        }

        if (!empty($certificate)) {
            $_certificate_name = Str::slug($request->name) . '_' . time() . '.' . $certificate->getClientOriginalExtension();
            $certificate->move(public_path('storage/uploads/certificates/'), $_certificate_name);
            $path = public_path('storage/uploads/certificates/' . $data->certificate);
            if (file_exists($path)) {
                unlink($path);
            }
        } else {
            $_certificate_name = $data->certificate;
        }

        $data->courses           = json_encode($request->courses);
        $data->teachereducations = json_encode($request->education);
        $data->birthday          = $request->birthday;
        $data->mobile            = $request->mobile;
        $data->national          = $request->nationality;
        $data->father_name       = $request->fathername;
        $data->gender            = $request->gender;
        $data->address           = $request->address;
        $data->parmanet_address  = $request->parmanet_address;
        $data->university        = $request->university;
        $data->photo             = $_photo_name;
        $data->nid               = $_nid_name;
        $data->certificate       = $_certificate_name;

        $data->save();

        return back()->with('success', "Information Update Successfull!");
    }

    function teacherView($id) {
        $teacher = TeacherRegistration::find($id);
        return view('backend.teacher.view', compact('teacher'));
    }
    function teacherreject($id) {
        $teacher         = TeacherRegistration::find($id);
        $teacher->status = 3;
        $teacher->save();
        return back()->with('success', 'Teacher Account Rejected!');
    }
    function teacherapprove($id) {
        $teacher         = TeacherRegistration::find($id);
        $teacher->status = 2;
        $teacher->save();
        return back()->with('success', 'Teacher Account Approved!');
    }

}
