<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Library\SslCommerz\SslCommerzNotification;
use App\Models\EmailVerificationToken;
use App\Models\Offer;
use App\Models\Order;
use App\Models\OrderInstallment;
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
            'mobile'      => ['required', 'string', 'min:11', 'unique:users'],
            'email'       => ['required', 'string', 'email', 'max:255', 'unique:users'],
            'password'    => ['required', 'string', 'min:8'],
            "birthday"    => '',
            "nationality" => '',
            "fathername"  => '',
            "gender"      => '',
            "address"     => '',
        ]);
        $insertUser                    = new User();
        $insertUser->name              = $request->name;
        $insertUser->mobile            = $request->mobile;
        $insertUser->email             = $request->email;
        $insertUser->password          = Hash::make($request->password);
        $insertUser->save();
        $insertUser->assignRole(3);
        $student_id = "EXN-". random_int(100000, 999999);
        if ($insertUser) {

            $verifyToken = new EmailVerificationToken();
            $verifyToken->user_id = $insertUser->id;
            $verifyToken->token = random_int(100000, 999999);;
            $verifyToken->save();


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
            $data->student_id   = $student_id;
            $data->save();

        }
        

        $credentials = $request->only('email', 'password');
        if (Auth::attempt($credentials)) {
            $request->user()->sendEmailVerificationNotification();
            return redirect()->route('frontend.home')
                ->with("success", "Registration Successfull!");
        }
    }

    function studentInformation(Request $request) {
        $this->validate($request, [
            "fathername"    => 'required',
            "birthday"      => 'required',
            "mobile"        => 'required',
            "nationality"   => 'required',
            "fathername"    => 'required',
            "gender"        => 'required',
            "address"       => 'required',
            'profile_photo' => 'required|mimes:jpeg,jpg,png|max:512',
        ]);

        $profile_photo = $request->file('profile_photo');
        $_photo_name   = Str::slug(auth()->user()->name) . '_' . time() . '.' . $profile_photo->getClientOriginalExtension();

        $profile_photo->move(public_path('storage/uploads/profiles/'), $_photo_name);

        $data                = new StudentRegistration();
        $data->user_id       = auth()->user()->id;
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

    function showAll() {
        $students = User::role('student')->with('student')->OrderBy('created_at', 'DESC')->get();
        return view('backend.student.index', compact('students'));
    }

    function showOrders() {
        $ourOrders = Order::where('user_id', auth()->user()->id)->with('OrderInstallments', 'course')->OrderBy('created_at', 'DESC')->get();
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
            "birthday"      => '',
            "mobile"        => '',
            "nationality"   => '',
            "fathername"    => '',
            "gender"        => '',
            "address"       => '',
            'profile_photo' => 'mimes:jpeg,jpg,png|max:512',
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

    function installmentpay($id) {
        $installment = OrderInstallment::find($id);
        // return $installment->installment;
        // return $installment->transaction_id;

        $post_data                 = array();
        $post_data['total_amount'] = $installment->bdt; # You cant not pay less than 10
        $post_data['currency']     = "BDT";
        $post_data['tran_id']      = uniqid(); // tran_id must be unique

        # CUSTOMER INFORMATION
        $post_data['cus_name']     = auth()->user()->name;
        $post_data['cus_email']    = auth()->user()->email;
        $post_data['cus_add1']     = 'Customer Address';
        $post_data['cus_add2']     = "";
        $post_data['cus_city']     = "";
        $post_data['cus_state']    = "";
        $post_data['cus_postcode'] = "";
        $post_data['cus_country']  = "Bangladesh";
        $post_data['cus_phone']    = auth()->user()->student->mobile;
        $post_data['cus_fax']      = "";

        # SHIPMENT INFORMATION
        $post_data['ship_name']     = "Store Test";
        $post_data['ship_add1']     = "Dhaka";
        $post_data['ship_add2']     = "Dhaka";
        $post_data['ship_city']     = "Dhaka";
        $post_data['ship_state']    = "Dhaka";
        $post_data['ship_postcode'] = "1000";
        $post_data['ship_phone']    = "";
        $post_data['ship_country']  = "Bangladesh";

        $post_data['shipping_method']  = "NO";
        $post_data['product_name']     = "Computer";
        $post_data['product_category'] = "Goods";
        $post_data['product_profile']  = "physical-goods";

        # OPTIONAL PARAMETERS
        $post_data['value_a'] = "ref001";
        $post_data['value_b'] = "ref002";
        $post_data['value_c'] = "ref003";
        $post_data['value_d'] = "ref004";

        if ($installment->status == 1) {
            $installment->update([
                'transaction_id' => $post_data['tran_id'],
            ]);
        }

        $sslc = new SslCommerzNotification();
        # initiate(Transaction Data , false: Redirect to SSLCOMMERZ gateway/ true: Show all the Payement gateway here )
        $payment_options = $sslc->makePayment($post_data, 'hosted');

        if (!is_array($payment_options)) {
            print_r($payment_options);
            $payment_options = array();
        }
    }


    public function studentNotification(){
        $datas = Offer::where('status', 1)->orderBy('id', 'desc')->get();
        return view('backend.offer.studentnotification', compact('datas'));

    }
    public function studentNotificationView($id){
        $data = Offer::find($id);
        return view('backend.offer.studennotificationview', compact('data'));
    }

}
