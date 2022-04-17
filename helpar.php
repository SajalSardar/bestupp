<?php

use App\Models\Course;
use App\Models\SocialNetwork;
use App\Models\ThemeOptions;

function socilas() {
    $data = SocialNetwork::orderBy('id', 'DESC')->get();
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
    $data = Course::where('status', 1)->select('id', 'name', 'slug')->limit(6)->get();
    return $data;
}

function courseTitietwo() {
    $data = Course::where('status', 1)->select('id', 'name', 'slug')->offset(6)->limit(6)->get();
    return $data;
}