<?php

namespace App\Domain\Builder;

use App\Domain\Dto\ServiceDto;
use App\Domain\Models\Service;

class ServiceBuilder
{
    public static function buildFromDto(ServiceDto $serviceDto): Service
    {
        return new Service([
            'name' => $serviceDto->name,
            'description' => $serviceDto->description,
            'price' => $serviceDto->price,
            'duration' => $serviceDto->duration,
        ]);
    }
}
