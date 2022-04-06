<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Contact;
use Illuminate\Http\Request;

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
        ]);

        $data            = new Contact();
        $data->full_name = $request->name;
        $data->mobile    = $request->mobile;
        $data->email     = $request->email;
        $data->message   = $request->message;
        $data->save();
        return back()->with('success', "Message Send Successfully!");
    }

    public function showAll() {
        $datas = Contact::all();
        return view('backend.contact.index', compact('datas'));
    }
}
