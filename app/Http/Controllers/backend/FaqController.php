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

    function edit($id) {
        $data = Faq::find($id);
        return view('backend.faq.edit', compact('data'));
    }
    function update(Request $request, $id) {
        $data = Faq::find($id);

        $this->validate($request, [
            "question" => "required",
            "answer"   => "required",
        ]);

        $data->question = $request->question;
        $data->answer   = $request->answer;
        $data->save();
        return back()->with('success', "FAQ Update Successfull!");
    }

    function delete($id) {
        $data = Faq::find($id);
        $data->delete();
        return back()->with('success', "FAQ Delete Successfull!");
    }
}
