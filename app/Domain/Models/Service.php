<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
    ];

    public function reservartion(): BelongsToMany
    {
        return $this->belongsToMany(Reservation::class, 'reservation_services');
    }
}
