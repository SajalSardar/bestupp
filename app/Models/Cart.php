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

    /**
     * The attributes that should be cast.
     *
     * @var array<string, string>
     */
    protected $casts = [
        'selected_time' => 'datetime',
    ];
}
