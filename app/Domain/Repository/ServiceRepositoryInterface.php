<?php

namespace App\Domain\Repository;

use App\Domain\Models\Service;

interface ServiceRepositoryInterface
{
    public function save(Service $service): void;
}
