<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;

class CourseController extends Controller {

    function index() {
        $data = Course::all();
        //$new  = strip_tags($data);
        return CourseResource::collection($data);
        //return CourseResource::collection($new);
    }

    function show(Course $course) {
        return new CourseResource($course);
    }
}
