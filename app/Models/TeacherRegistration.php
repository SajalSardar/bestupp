<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TeacherRegistration extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        "name",
        "birthday",
        "mobile",
        "address",
        "national",
        "education",
        "father_name",
        "gender",
        "email",
        "parmanet_address",
        "course",
        "university",
        "nid",
        "photo",
        "certificate",
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'birthday' => 'datetime',
    ];
}
