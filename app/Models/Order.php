<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model {
    use HasFactory;
    protected $guarded = ['id'];

    function OrderInstallments() {
        return $this->hasMany(OrderInstallment::class);
    }

    function course() {
        return $this->belongsTo(Course::class);
    }

    function user() {
        return $this->belongsTo(User::class);
    }

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'selected_time' => 'datetime',
    ];
}
