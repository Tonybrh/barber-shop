<?php

namespace App\Http\Controller\BarberService;

use App\Domain\Dto\ServiceDto;
use App\Http\Requests\BarberService\CreateServiceRequest;
use App\Infrastructure\Services\BarberService\ServiceCreator;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

readonly class CreateServicePostAction
{
    public function __construct(private ServiceCreator $serviceCreator)
    {
    }

    public function __invoke(CreateServiceRequest $request): JsonResponse
    {
        $serviceDto = ServiceDto::fromRequest($request);

        return new JsonResponse(
            ($this->serviceCreator)($serviceDto),
            Response::HTTP_CREATED
        );
    }
}
