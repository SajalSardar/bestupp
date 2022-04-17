<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\FreeLearning;
use Illuminate\Http\Request;

class FreeLearningController extends Controller {

    function index() {
        $datas = FreeLearning::with('course')->orderBy('created_at', 'DESC')->get();
        return view('backend.learning.index', compact('datas'));
    }

    function store(Request $request) {
        $this->validate($request, [
            "course_id" => "required",
            "name"      => "required",
            "email"     => "required",
            "mobile"    => "required",
        ]);

        $data            = new FreeLearning();
        $data->course_id = $request->course_id;
        $data->name      = $request->name;
        $data->email     = $request->email;
        $data->mobile    = $request->mobile;
        $data->address   = $request->address;
        $data->save();
        return response()->json(['success' => 'Your Information Successfully Done!']);
    }

}
