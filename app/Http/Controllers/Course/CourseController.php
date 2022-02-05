<?php

namespace App\Http\Controllers\Course;

use App\Models\Course;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\URL;
use App\Http\Controllers\Controller;

class CourseController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('backend.banner.index');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('backend.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $banner_photo   = $request->file('banner_image');

        

        $this->validate($request,[
            "name" => "required",
            "description" => "required",
            "overview" => "required",
            "duration" => "required",
            "total_class" => "required",
            "class_info" => "required",
            "course_fee" => "required",
            "usdeuro" => "required",
            "installments" => "required",
            "banner_image" => "required|mimes:jpg,jpeg,png,webp|max:5000",
        ]);

        if ($banner_photo) {
            $_photo_name = Str::slug($request->name) . '-' . time() . '.' . $banner_photo->getClientOriginalExtension();
            $photo_url   = URL::asset('storage/uploads/course/' . $_photo_name);

            $photo_uploades = $banner_photo->move(public_path('storage/uploads/course/'), $_photo_name);
            if($photo_uploades){
                $course = new Course();
                $course->name = $request->name;
                $course->description = $request->description;
                $course->overview = $request->overview;
                $course->duration = $request->duration;
                $course->total_class = $request->total_class;
                $course->class_info = $request->class_info;
                $course->course_fee = $request->course_fee;
                $course->usdeuro = $request->usdeuro;
                $course->installments = json_encode($request->installments);
                $course->banner_image = $photo_url;
                $course->save();
                return back()->with('success', "Course Add Success!");
            }else{
                return back()->with('error', "Photo Not uploaded!");
            }
        }
        
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function show(Course $course)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function destroy(Course $course)
    {
        //
    }
}
