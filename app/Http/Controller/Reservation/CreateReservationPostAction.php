<?php

namespace App\Http\Controller\Reservation;

use App\Http\Requests\CreateReservationRequest;
use App\Infrastructure\Services\Reservation\CreateReservationService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

readonly class CreateReservationPostAction
{
    public function __construct(
        private CreateReservationService $reservationService
    ) {
    }

    public function __invoke(CreateReservationRequest $request): JsonResponse
    {
        return new JsonResponse(
            ($this->reservationService)($request),
            Response::HTTP_CREATED
        );
    }
}
