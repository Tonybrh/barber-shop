<?php

namespace App\Infrastructure\Services\Reservation;

use App\Domain\Builder\ReservationBuilder;
use App\Http\Requests\CreateReservationRequest;
use App\Infrastructure\Repository\ReservationRepository;
use App\Infrastructure\Services\User\LoggedUserService;

readonly class CreateReservationService
{
    public function __construct(
        private LoggedUserService $userService,
        private ReservationRepository $reservationRepository
    ) {
    }

    public function __invoke(CreateReservationRequest $request): void
    {
        if($this->hasActiveReservation($this->userService->getId())) {
            throw new \Exception('Você já tem um agendamento ativo.');
        }

        $reservation = ReservationBuilder::build(
            $this->userService->getName(),
            $this->userService->getEmail(),
            $this->userService->getPhone(),
            $request->input('date'),
            $this->userService->getId(),
            $request->input('barber_id')
        );


        $this->reservationRepository->save($reservation);
        $reservation->services()->attach($request->input('services'));
    }

    private function hasActiveReservation(int $userId): bool
    {
        return $this->reservationRepository->hasActiveReservation($userId);
    }
}
