<?php

namespace App\Domain\Repository;

use App\Domain\Models\Reservation;

interface ReservationRepositoryInterface
{
    public function save(Reservation $reservation): void;
    public function findByBarberId(int $id): array;
    public function hasActiveReservation(int $userId): bool;
}
