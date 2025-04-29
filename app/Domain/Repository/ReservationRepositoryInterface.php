<?php

namespace App\Domain\Repository;

use App\Domain\Models\Reservation;

interface ReservationRepositoryInterface
{
    public function save(Reservation $reservation): void;
}
