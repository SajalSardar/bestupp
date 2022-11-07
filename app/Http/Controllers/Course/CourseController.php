<?php

namespace App\Http\Controllers\Course;

use App\Http\Controllers\Controller;
use App\Models\Course;
use App\Models\CourseInstallment;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class CourseController extends Controller {
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct() {
        $this->middleware('auth');
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index() {
        $datas = Course::orderBy('id', 'DESC')->get();

        return view('backend.course.index', compact('datas'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create() {
        return view('backend.course.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request) {

        $banner_photo = $request->file('banner_image');
        $this->validate($request, [
            "name"         => "required|unique:courses,name",
            "description"  => "required",
            "overview"     => "required",
            "duration"     => "required",
            "total_class"  => "required",
            "class_info"   => "required",
            "class_days"   => "required",
            "course_fee"   => "required",
            "usdeuro"      => "required",
            "installment"  => "required",
            "banner_image" => "required|mimes:jpg,jpeg,png,webp|max:5000",
        ]);

        if ($banner_photo) {
            $course_slug = strip_tags($request->name);
            $_photo_name = Str::slug(strip_tags($request->name)) . '_' . time() . '.' . $banner_photo->getClientOriginalExtension();

            $photo_uploades = $banner_photo->move(public_path('storage/uploads/course/'), $_photo_name);
            if ($photo_uploades) {
                $course               = new Course();
                $course->name         = $request->name;
                $course->slug         = Str::slug($course_slug);
                $course->description  = $request->description;
                $course->overview     = $request->overview;
                $course->duration     = $request->duration;
                $course->total_class  = $request->total_class;
                $course->class_info   = $request->class_info;
                $course->class_days   = $request->class_days;
                $course->course_fee   = $request->course_fee;
                $course->usdeuro      = $request->usdeuro;
                $course->banner_image = $_photo_name;
                $course->discount = $request->discount;
                $course->save();

                if ($course->id && $request->installment) {
                    CourseInstallment::insert([
                        "course_id"  => $course->id,
                        "bdt"        => $request->installment['pay'],
                        "pay_date"   => $request->installment['day'],
                        "created_at" => now(),
                        "updated_at" => now(),
                    ]);
                }
                if ($course->id && $request->installment2['pay'] != null) {
                    CourseInstallment::insert([
                        "course_id"  => $course->id,
                        "bdt"        => $request->installment2['pay'],
                        "pay_date"   => $request->installment2['day'],
                        "created_at" => now(),
                        "updated_at" => now(),
                    ]);
                }

                if ($course->id && $request->installment3['pay'] != null) {
                    CourseInstallment::insert([
                        "course_id"  => $course->id,
                        "bdt"        => $request->installment3['pay'],
                        "pay_date"   => $request->installment3['day'],
                        "created_at" => now(),
                        "updated_at" => now(),
                    ]);
                }

                return redirect(route('dashboard.course.index'))->with('success', "Course Add Success!");
            } else {
                return back()->with('error', "Photo Not uploaded!");
            }
        }

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function edit(Course $course) {
        return view('backend.course.edit', compact('course'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Course $course) {

        $banner_photo = $request->file('banner_image');
        $this->validate($request, [
            "name"         => "required|unique:courses,name," . $course->id,
            "description"  => "required",
            "overview"     => "required",
            "duration"     => "required",
            "total_class"  => "required",
            "class_info"   => "required",
            "class_days"   => "required",
            "course_fee"   => "required",
            "usdeuro"      => "required",
            "installment1" => "required",
            "banner_image" => "mimes:jpg,jpeg,png,webp|max:5000",
        ]);

        if ($banner_photo) {
            $_photo_name = Str::slug(strip_tags($request->name)) . '_' . time() . '.' . $banner_photo->getClientOriginalExtension();

            $banner_photo->move(public_path('storage/uploads/course/'), $_photo_name);

            $path = public_path('storage/uploads/course/' . $course->banner_image);
            if (file_exists($path) && $course->banner_image != null) {
                unlink($path);
            }
        } else {
            $_photo_name = $course->banner_image;
        }

        $course_slug = strip_tags($request->name);

        $course->name         = $request->name;
        $course->slug         = Str::slug($course_slug);
        $course->description  = $request->description;
        $course->overview     = $request->overview;
        $course->duration     = $request->duration;
        $course->total_class  = $request->total_class;
        $course->class_info   = $request->class_info;
        $course->class_days   = $request->class_days;
        $course->course_fee   = $request->course_fee;
        $course->usdeuro      = $request->usdeuro;
        $course->banner_image = $_photo_name;
        $course->discount = $request->discount;
        $course->save();

        if ($course->id && $request->installment1) {
            CourseInstallment::where('id', $course->installments[0]['id'])->update([
                "bdt"        => $request->installment1,
                "updated_at" => now(),
            ]);
        }
        if ($course->id && $request->installment2) {
            CourseInstallment::where('id', $course->installments[1]['id'])->update([
                "bdt"        => $request->installment2,
                "pay_date"   => $request->day2,
                "updated_at" => now(),
            ]);
        }
        if ($course->id && $request->installment3) {
            CourseInstallment::where('id', $course->installments[2]['id'])->update([
                "bdt"        => $request->installment3,
                "pay_date"   => $request->day3,
                "updated_at" => now(),
            ]);
        }

        return back()->with('success', "Course Update Successfull!");

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Course  $course
     * @return \Illuminate\Http\Response
     */
    // public function destroy(Course $course) {
    //     $path = public_path('storage/uploads/course/' . $course->banner_image);
    //     if (file_exists($path) && $course->banner_image != null) {
    //         unlink($path);
    //     }
    //     $course->delete();
    //     foreach ($course->installments as $installment) {
    //         $installment->delete();
    //     }
    //     return back()->with('success', "Course Delete Successfull!");
    // }

    public function courseStatusUpdate(Course $course) {

        if ($course->status == 1) {
            $course->status = 2;
            $course->save();
            return back()->with('success', "Status Update Successfull!");
        }

        if ($course->status == 2) {
            $course->status = 1;
            $course->save();
            return back()->with('success', "Status Update Successfull!");
        }

    }

}
