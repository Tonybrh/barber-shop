<?php

namespace App\Http\Controller\Barber;

use App\Infrastructure\Services\Reservation\ListReservationService;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

readonly class ViewReservationsGetAction
{
    public function __construct(private ListReservationService $listReservationService)
    {
    }

    public function __invoke(Request $request): JsonResponse
    {
        return new JsonResponse(
            ($this->listReservationService)(),
            Response::HTTP_OK
        );
    }
}
