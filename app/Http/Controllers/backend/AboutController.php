<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\About;
use App\Models\AboutPageContent;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class AboutController extends Controller {

    public function aboutInfo() {
        $aboutData        = About::select('id', 'section_title', 'section_description', 'about_us', 'about_banner')->first();
        $aboutPageContent = AboutPageContent::all();
        return view('backend.about.index', compact('aboutData', 'aboutPageContent'));
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

    public function aboutContentInsert(Request $request) {
        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
        ]);
        $data = new AboutPageContent();
        $data->create($request->all());
        return back()->with('success', "Successfully Insert About Content!");
    }
    public function aboutContentEdit($id) {
        $data = AboutPageContent::findOrFail($id);
        return view('backend.about.edit', compact('data'));
    }
    public function aboutContentUpdate(Request $request, $id) {
        $data = AboutPageContent::findOrFail($id);
        $this->validate($request, [
            'title'       => 'required',
            'description' => 'required',
        ]);

        $data->title       = $request->title;
        $data->description = $request->description;
        return redirect(route('dashboard.about.us'))->with('success', "Successfully Update About Content!");
    }
    public function aboutContentDelete($id) {
        $data = AboutPageContent::findOrFail($id);
        $data->delete();
        return redirect(route('dashboard.about.us'))->with('success', "Successfully Delete About Content!");
    }
}
