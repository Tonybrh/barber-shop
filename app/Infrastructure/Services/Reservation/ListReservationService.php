<?php

namespace App\Infrastructure\Services\Reservation;

use App\Infrastructure\Repository\ReservationRepository;
use App\Infrastructure\Services\User\LoggedUserService;

class ListReservationService
{
    public function __construct(
        private readonly ReservationRepository $reservationRepository,
        private readonly LoggedUserService $loggedUserService
    ) {
    }

    public function __invoke(): array
    {
        return $this->reservationRepository->findByBarberId($this->loggedUserService->getId());
    }
}
