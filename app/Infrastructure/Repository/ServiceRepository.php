<?php

namespace App\Infrastructure\Repository;

use App\Domain\Models\Service;
use App\Domain\Repository\ServiceRepositoryInterface;

class ServiceRepository implements ServiceRepositoryInterface
{
    public function save(Service $service): void
    {
        $service->save();
    }
}
