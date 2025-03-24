<?php

namespace App\Infrastructure\Services\Reservation;

use App\Domain\Models\Reservation;
use App\Http\Requests\CreateReservationRequest;
use App\Infrastructure\Services\User\LoggedUserService;

class ReservationService
{
    public function __construct(
        private LoggedUserService $userService
    ) {
    }

    public function __invoke(CreateReservationRequest $request)
    {
        return Reservation::query()->create([
            'name' => $this->userService->getName(),
            'email' => $this->userService->getEmail(),
            'phone' => $this->userService->getPhone(),
            'date' => $request->input('date'),
            'user_id' => $this->userService->getId(),
            'barber_id' => $request->input('barber_id')
        ]);
    }
}
