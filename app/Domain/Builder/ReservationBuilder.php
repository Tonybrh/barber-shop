<?php

namespace App\Domain\Builder;

use App\Domain\Models\Reservation;

class ReservationBuilder
{
    public static function build(
        string $name,
        string $email,
        string $phone,
        string $date,
        int $userId,
        int $barberId
    ): Reservation {
        return new Reservation([
            'name' => $name,
            'email' => $email,
            'phone' => $phone,
            'date' => $date,
            'user_id' => $userId,
            'barber_id' => $barberId
        ]);
    }
}
