<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Course extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'slug',
        'description',
        'overview',
        'duration',
        'total_class',
        'class_info',
        'course_fee',
        'usdeuro',
        'installments',
        'banner_image',
    ];
}
