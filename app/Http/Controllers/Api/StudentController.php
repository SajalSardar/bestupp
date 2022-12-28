<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use App\Models\Order;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use App\Models\OrderInstallment;
use App\Models\StudentRegistration;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Models\EmailVerificationToken;

class StudentController extends Controller {
    public function studentRegistration(Request $request) {
        $this->validate($request, [
            'name'     => ['required', 'string', 'max:255'],
            'email'    => ['required', 'max:255', 'unique:users'],
            'password' => ['required', 'string', 'min:8'],
        ]);
        $username = $this->userName($request->email);

        $insertUser = User::create([
            "name"              => $request->name,
            "email"             => $username['email'],
            "phone"             => $username['phone'],
            "password"          => Hash::make($request->password),
        ]);
        $insertUser->assignRole(3);

        $verifyToken = new EmailVerificationToken();
        $verifyToken->user_id = $insertUser->id;
        $verifyToken->token = random_int(100000, 999999);
        $verifyToken->save();

        $token    = $insertUser->createToken('apptoken')->plainTextToken;
        $response = [
            'user'  => $insertUser,
            'token' => $token,
        ];

        return response($response, 201);

    }

    private function userName($username)
    {
        if(filter_var($username, FILTER_VALIDATE_EMAIL)){
            return [
                'email' => $username,
                'phone' => null,
            ];
        }else {
            return [
                'email' => null,
                'phone' => $username
            ];
        }
    }

    public function showOrders() {
        $ourOrders = Order::where('user_id', auth()->user()->id)->with('OrderInstallments', 'course')->OrderBy('created_at', 'DESC')->get();
        return response($ourOrders, 201);
    }

    public function studentProfile() {
        $studentProfile = User::where('id', auth()->user()->id)->with('student')->first();
        return response($studentProfile, 201);
    }

    public function studentUpdate(Request $request) {
        $photo = base64_decode($request->profile_photo);

        $user = Auth::user();
        $this->validate($request, [
            "birthday"    => 'required',
            "mobile"      => 'required',
            "nationality" => 'required',
            "fathername"  => 'required',
            "gender"      => 'required',
            "address"     => 'required',
        ]);

        if ($photo) {

            if (!empty($user->student) && $user->student->profile_photo != null) {
                $path = public_path('storage/uploads/profiles/' . $user->student->profile_photo);
                if (file_exists($path)) {
                    unlink($path);
                }
            }

            $_photo_name = Str::slug($user->name) . '_' . time() . '.' . 'jpg';
            file_put_contents(public_path('storage/uploads/profiles/') . $_photo_name, $photo);

        } else {
            $_photo_name = $user->student->profile_photo ?? null;
        }

        $studentInformation = StudentRegistration::updateOrCreate([
            'user_id' => $user->id,
        ], [
            "birthday"      => $request->birthday,
            "mobile"        => $request->mobile,
            "nationality"   => $request->nationality,
            "guardianname"  => $request->guardianname,
            "fathername"    => $request->fathername,
            "gender"        => $request->gender,
            "address"       => $request->address,
            "gnumber"       => $request->gnumber,
            "profile_photo" => $_photo_name,
        ]);

        return response($studentInformation, 201);
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
        return response([
            "pay_info" => $post_data,
        ]);

    }


}
