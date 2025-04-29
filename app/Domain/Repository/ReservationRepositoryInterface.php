<?php

namespace App\Domain\Repository;

use App\Domain\Models\Reservation;

interface ReservationRepositoryInterface
{
    public function save(Reservation $reservation): void;
    public function findAll(): array;
    public function hasActiveReservation(int $userId): bool;
}
