<?php

use App\Models\Course;
use App\Models\SocialNetwork;
use App\Models\ThemeOptions;

function socilas() {
    $data = SocialNetwork::all();
    return $data;
}

function themeoptions() {
    $data = ThemeOptions::firstOrFail();
    return $data;
}

function courses() {
    $data = Course::where('status', 1)->select('id', 'name', 'slug')->get();
    return $data;
}
function courseTitieOne() {
    $data = Course::where('status', 1)->select('id', 'name', 'slug')->get();
    return $data;
}
