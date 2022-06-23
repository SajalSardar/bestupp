<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderInstallment;
use App\Models\PrivacyPolicy;
use App\Models\StudentRegistration;
use App\Models\TeacherRegistration;
use App\Models\User;
use App\Notifications\DueNotification;
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

    //Privacy Policy

    function createPolicy() {
        $policy = PrivacyPolicy::all();
        return view('backend.policy.index', compact('policy'));
    }
    function insertPolicy(Request $request) {
        $policy = new PrivacyPolicy();
        $request->validate([
            "title"          => "required",
            "privacy_policy" => "required",
        ]);

        $policy->title          = $request->title;
        $policy->privacy_policy = $request->privacy_policy;
        $policy->save();
        return back()->with('success', "Privacy Policy Added!");
    }
    function editPolicy($id) {
        $Policy = PrivacyPolicy::findOrFail($id);
        return view('backend.policy.edit', compact('Policy'));
    }

    function updatePolicy(Request $request, $id) {
        $policy = PrivacyPolicy::find($id);
        $request->validate([
            "title"          => "required",
            "privacy_policy" => "required",
        ]);

        $policy->title          = $request->title;
        $policy->privacy_policy = $request->privacy_policy;
        $policy->save();
        return redirect(route('dashboard.privacy.policy.index'))->with('success', "Privacy Policy Updated!");
    }

    function deletePolicy($id) {
        $Policy = PrivacyPolicy::findOrFail($id);
        $Policy->delete();
        return back()->with('success', "Privacy Policy Deleted!");
    }

    // all admin
    function allAdmin() {
        $all_admin = User::with(['roles' => function ($q) {
            $q->where('name', 'super-admin');
        }])->get();
        return view('backend.all_admin.index', compact('all_admin'));
    }

    function dueNotification() {

        return view('backend.due_notification.index');

    }
    function dueNotificationSubmit(Request $request) {

        $orders = Order::with(['OrderInstallments' => function ($q) use ($request) {

            $q->where('transaction_id', null)->where('paydate', '<=', $request->day);
        }, 'user', 'course'])->get();

        return view('backend.due_notification.index', compact('orders'));

    }

    function dueNotificationSend($id) {
        $OrderInstallment = OrderInstallment::find($id);
        $OrderInstallment->order->user->notify(new DueNotification($OrderInstallment));
        $OrderInstallment->send_notification = now();
        $OrderInstallment->save();
        return back()->with('success', "Notification Successfully Send!");
    }

}
