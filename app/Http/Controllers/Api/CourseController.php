<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;

class CourseController extends Controller {

    function index() {
        $data = Course::where('status', 1)->get();
        return CourseResource::collection($data);
    }

    function show(Course $course) {
        return new CourseResource($course);
    }
}
