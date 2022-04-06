<?php

namespace App\Http\Controllers\backend;

use App\Http\Controllers\Controller;
use App\Models\ThemeOptions;
use Illuminate\Http\Request;

class ThemeController extends Controller {
    public function index() {
        $data = ThemeOptions::firstOrFail();
        return view('backend.options', compact('data'));
    }
    public function update(Request $request, $id) {
        $data      = ThemeOptions::findOrFail($id);
        $logo      = $request->file('logo');
        $logo_icon = $request->file('logo_icon');
        if ($logo) {
            $_logo_name = 'exnin' . '.' . $logo->getClientOriginalExtension();
            $logo->move(public_path('storage/uploads/logo/'), $_logo_name);
        } else {
            $_logo_name = $data->logo;
        }
        if ($logo_icon) {
            $_logo_icon_name = 'exnin-icon' . '.' . $logo_icon->getClientOriginalExtension();
            $logo_icon->move(public_path('storage/uploads/logo/'), $_logo_icon_name);
        } else {
            $_logo_icon_name = $data->logo_icon;
        }

        $data->logo                     = $_logo_name;
        $data->logo_icon                = $_logo_icon_name;
        $data->header_contact           = $request->header_contact;
        $data->header_slogan            = $request->header_slogan;
        $data->footer_google_store_link = $request->footer_google_store_link;
        $data->footer_number            = $request->footer_number;
        $data->footer_email             = $request->footer_email;
        $data->footer_site_link         = $request->footer_site_link;
        $data->footer_copy              = $request->footer_copy;
        $data->home_app_title           = $request->home_app_title;
        $data->home_app_sub_title       = $request->home_app_sub_title;
        $data->home_app_description     = $request->home_app_description;
        $data->faq_title                = $request->faq_title;
        $data->faq_subtitle             = $request->faq_subtitle;
        $data->course_title             = $request->course_title;
        $data->course_subtitle          = $request->course_subtitle;
        $data->student_title            = $request->student_title;
        $data->student_subtitle         = $request->student_subtitle;
        $data->teacher_title            = $request->teacher_title;
        $data->teacher_subtitle         = $request->teacher_subtitle;
        $data->save();
        return back()->with('success', "Update Success!");
    }
}
