<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;
use Mews\Captcha\Facades\Captcha;

class ContactController extends Controller {
    public function contact() {
        return view('frontend.contact');
    }

    public function contactStore(Request $request) {
        $this->validate($request, [
            "name"    => 'required',
            "mobile"  => 'required',
            "email"   => 'required',
            "message" => 'required',
            'captcha' => 'required|captcha',
        ]);

        $data            = new Contact();
        $data->full_name = $request->name;
        $data->mobile    = $request->mobile;
        $data->email     = $request->email;
        $data->message   = $request->message;
        $data->status    = 1;
        $data->save();
        return back()->with('success', "Message Successfully Send!");
    }

    public function reloadCaptcha() {
        return response()->json(['captcha' => Captcha::img()]);
    }

    public function showAll() {
        $datas = Contact::all();
        return view('backend.contact.index', compact('datas'));
    }
    public function markasread($id) {
        $data         = Contact::find($id);
        $data->status = 2;
        $data->save();
        return back()->with('success', "Message Mark as Read!");
    }
    public function deleteContact($id) {
        $data = Contact::find($id);
        $data->delete();
        return back()->with('success', "Delete Successfull!");
    }
}
