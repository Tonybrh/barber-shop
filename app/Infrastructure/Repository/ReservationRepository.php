<?php

namespace App\Infrastructure\Repository;

use App\Domain\Models\Reservation;
use App\Domain\Repository\ReservationRepositoryInterface;

readonly class ReservationRepository implements ReservationRepositoryInterface
{
    public function __construct(private Reservation $reservation)
    {
    }

    public function save(Reservation $reservation): void
    {
        $reservation->save();
    }

    public function findByBarberId(int $id): array
    {
        return $this->reservation->query()
            ->where('barber_id', $id)
            ->get()
            ->toArray();
    }

    public function hasActiveReservation(int $userId): bool
    {
        return $this->reservation->query()
            ->where('user_id', $userId)
            ->where('active', true)
            ->exists();
    }
}
