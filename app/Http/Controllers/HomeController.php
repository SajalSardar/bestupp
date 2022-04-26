<?php

namespace App\Http\Controllers;

use App\Models\OrderInstallment;
use App\Models\StudentRegistration;
use App\Models\TeacherRegistration;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class HomeController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index() {
        $teacher  = TeacherRegistration::where('user_id', auth()->user()->id)->select('id', 'status')->first();
        $sales    = OrderInstallment::select('bdt', 'transaction_id', 'status')->get();
        $students = StudentRegistration::all();
        return view('backend.dashboard', compact('teacher', 'sales', 'students'));
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function editProfile() {
        return view('backend.profile.index');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function updateProfile(Request $request, $id) {

        $userdata = User::find($id);
        $this->validate($request, [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $userdata->id,
            'password' => 'confirmed',
        ]);

        $userdata->name  = $request->name;
        $userdata->email = $request->email;
        if ($request->password) {
            $userdata->password = Hash::make($request->password);
        }
        $userdata->save();

        return back()->with('success', "Profile Update Successfull!");

    }

}
