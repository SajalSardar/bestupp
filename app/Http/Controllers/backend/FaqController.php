<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\Faq;
use Illuminate\Http\Request;

class FaqController extends Controller {

    function index() {
        $datas = Faq::all();
        return view('backend.faq.index', compact('datas'));
    }

    function store(Request $request) {
        $this->validate($request, [
            "question" => "required",
            "answer"   => "required",
        ]);

        $data           = new Faq();
        $data->question = $request->question;
        $data->answer   = $request->answer;
        $data->save();
        return back()->with('success', "FAQ Added!");
    }
}
