<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\CourseResource;
use App\Models\Course;

class CourseController extends Controller {

    function index() {
        return CourseResource::collection(Course::all());
    }

    function show(Course $course) {
        return new CourseResource($course);
    }
}
