<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Offer;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\PrivacyPolicy;
use App\Models\OrderInstallment;
use App\Models\StudentRegistration;
use App\Models\TeacherRegistration;
use Illuminate\Support\Facades\Hash;
use App\Notifications\DueNotification;

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
        $rules = [
            'name'     => 'required|string|max:255',
            'email'    => 'required|email|max:255|unique:users,email,' . $userdata->id,
            'password' => 'confirmed',
        ];

        if($request->password){
            $rules['current_password'] = 'required|min:8';
        }

        $this->validate($request, $rules);

        $userdata->name  = $request->name;
        $userdata->email = $request->email;
        if ($request->password) {
            if(!Hash::check($request->current_password, $userdata->password)){
                return back()->withErrors(['current_password' => 'Sorry, Your old password does not match.'])->withInput();
            }
            $userdata->password = Hash::make($request->password);
        }
        $userdata->save();

        return back()->with('success', "Profile Update Successfull!");

    }

    //Privacy Policy

    function createPolicy() {
        $policy = PrivacyPolicy::orderBy('id', 'asc')->get();
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
        $request->validate([
            "day" => 'required'
        ]);

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


    public function createOffer(){
        $datas = Offer::all();
        return view('backend.offer.index', compact('datas'));
    }
    public function insertOffer(Request $request){
        $banner_photo = $request->file('offer_image');
        $this->validate($request, [
            'title' => 'required',
            'offer_image' => 'mimes:jpeg,jpg,png|required|max:512',
        ]);
        if ($banner_photo) {
            $_photo_name = Str::slug($request->title) . '.' . $banner_photo->getClientOriginalExtension();

            $photo_uploades = $banner_photo->move(public_path('storage/uploads/offer/'), $_photo_name);

            if ($photo_uploades) {
                $data               = new Offer();
                $data->title = $request->title;
                $data->offer_image = $_photo_name;
                $data->description = $request->description;
                $data->home_popup = $request->home_popup ? true : null;
                $data->save();
                return back()->with('success', "Successfully Uploaded Offer!");
            }

        }
    }
    public function editOffer( $id){
        $data  = Offer::find($id);
        return view('backend.offer.edit', compact('data'));
    }
    public function updateOffer(Request $request, $id){
        $data               = Offer::find($id);
        $banner_photo = $request->file('offer_image');
        $this->validate($request, [
            'title' => 'required'
        ]);
        if($banner_photo){
            $_photo_name = Str::slug($request->title) . '.' . $banner_photo->getClientOriginalExtension();

            $photo_uploades = $banner_photo->move(public_path('storage/uploads/offer/'), $_photo_name);
            if($photo_uploades){
                $path = public_path('storage/uploads/offer/' . $data->offer_image);
                if (file_exists($path) && $data->offer_image != null) {
                    unlink($path);
                }
            }
        }else{
            $_photo_name = $data->offer_image;
        }
        $data->title = $request->title;
        $data->offer_image = $_photo_name;
        $data->description = $request->description;
        $data->home_popup = $request->home_popup ? true : null;
        $data->save();
        return back()->with('success', "Successfully Update Offer!");
    }
    public function deleteOffer(Offer $offer) {

        $path = public_path('storage/uploads/offer/' . $offer->offer_image);
        if (file_exists($path) && $offer->offer_image != null) {
            unlink($path);
        }
        $offer->delete();
        return back()->with('success', 'Delete Successfull!');
    }
    public function statusOffer(Offer $offer) {

        if($offer->status == 1){
            $offer->status = 2;
            $offer->save();
        }else{
            $offer->status = 1;
            $offer->save();
        }
        return back()->with('success', 'Status Update Successfull!');
    }

}
