<?php

namespace App\Domain\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Service extends Model
{
    protected $fillable = [
        'name',
        'description',
        'price',
        'duration',
    ];

    public function reservartion(): BelongsTo
    {
        return $this->belongsTo(Reservation::class);
    }
}
