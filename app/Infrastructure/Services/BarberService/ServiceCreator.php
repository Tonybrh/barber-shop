<?php

namespace App\Infrastructure\Services\BarberService;

use App\Domain\Builder\ServiceBuilder;
use App\Domain\Dto\ServiceDto;
use App\Infrastructure\Repository\ServiceRepository;

readonly class ServiceCreator
{
    public function __construct(private ServiceRepository $serviceRepository)
    {
    }

    public function __invoke(ServiceDto $serviceDto): void
    {
        $service = ServiceBuilder::buildFromDto($serviceDto);

        $this->serviceRepository->save($service);
    }
}
