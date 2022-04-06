<?php

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