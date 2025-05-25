<?php

namespace App\Http\Controller\Client;

use App\Infrastructure\Services\Client\AllClientService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

readonly class AllClientGetAction
{
    public function __construct(
        private AllClientService $allClientService
    ) {
    }

    public function __invoke(): JsonResponse
    {
        return new JsonResponse(($this->allClientService)(), Response::HTTP_OK);
    }
}
