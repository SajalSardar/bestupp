<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model {
    use HasFactory;
    protected $guarded = ['id'];

    function course() {
        return $this->belongsTo(Course::class);
    }
}
