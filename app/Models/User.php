<?php

namespace App\Models;

use Laravel\Sanctum\HasApiTokens;
use Spatie\Permission\Traits\HasRoles;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable implements MustVerifyEmail{
    use HasApiTokens, HasFactory, Notifiable, SoftDeletes, HasRoles;

    function student() {
        return $this->hasOne(StudentRegistration::class);
    }

    function teacher() {
        return $this->hasOne(TeacherRegistration::class);
    }

    function orders() {
        return $this->hasMany(Order::class);
    }

    function notices() {
        return $this->belongsToMany(Notice::class);
    }

    function verificationToken() {
        return $this->hasOne(EmailVerificationToken::class);
    }

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'status',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
}
