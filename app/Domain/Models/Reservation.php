<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Reservation extends Model
{
    protected $fillable = [
        'name',
        'email',
        'phone',
        'date',
        'user_id',
        'barber_id'
    ];

    protected $casts = [
        'date' => 'datetime',
        'name' => 'string',
        'email' => 'string',
        'phone' => 'string',
        'user_id' => 'integer',
        'barber_id' => 'integer'
    ];

    public function user_id(): BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }

    public function services(): HasMany
    {
        return $this->hasMany(Service::class);
    }
}
