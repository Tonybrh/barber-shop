<?php

namespace App\Infrastructure\Services\Reservation;

use App\Infrastructure\Repository\ReservationRepository;

class ListReservationService
{
    public function __construct(
        private readonly ReservationRepository $reservationRepository
    ){
    }

    public function __invoke(): array
    {
        return $this->reservationRepository->findAll();
    }
}
