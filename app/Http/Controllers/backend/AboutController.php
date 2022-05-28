<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller {

    public function aboutInfo() {
        $aboutData = About::select('id', 'section_title', 'section_description', 'about_us', 'about_banner')->first();
        return view('backend.about.index', compact('aboutData'));
    }

    public function aboutUpdate(Request $request, $id) {
        $banner_photo = $request->file('banner_image');
        $data         = About::find($id);
        $this->validate($request, [
            'section_title' => 'required',
            'banner_image'  => 'mimes:jpeg,jpg,png|max:5120',
        ]);

        if (!empty($banner_photo)) {
            $_photo_name = Str::slug(strip_tags($request->section_title)) . '.' . $banner_photo->getClientOriginalExtension();

            $banner_photo->move(public_path('storage/uploads/about/'), $_photo_name);
            $path = public_path('storage/uploads/about/' . $data->about_banner);
            if (file_exists($path) && $data->about_banner) {
                unlink($path);
            }
        } else {
            $_photo_name = $data->about_banner;
        }

        $data->section_title       = $request->section_title;
        $data->section_description = $request->section_description;
        $data->about_us            = $request->about_us;
        $data->about_banner        = $_photo_name;
        $data->save();
        return back()->with('success', "Successfully Uploaded About Content!");

    }
}
