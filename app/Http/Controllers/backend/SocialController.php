<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\SocialNetwork;
use Illuminate\Http\Request;

class SocialController extends Controller {

    public function index() {
        $datas = SocialNetwork::all();
        return view('backend.social.index', compact('datas'));
    }

    public function store(Request $request) {
        $this->validate($request, [
            'name' => "required",
            'link' => "required",
        ]);

        $data       = new SocialNetwork();
        $data->name = $request->name;
        $data->link = $request->link;
        $data->save();
        return back()->with('success', "Add Social Media!");
    }
}
