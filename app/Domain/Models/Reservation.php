<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{

    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'time',
        'guests',
        'message',
    ];

    protected $casts = [
        'date' => 'datetime',
    ];
}
