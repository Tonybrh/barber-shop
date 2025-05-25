<?php

namespace App\Infrastructure\Services\Client;

use App\Domain\Models\User;
use Illuminate\Database\Eloquent\Collection;

class AllClientService
{
    public function __invoke(): Collection
    {
        return User::whereHas('roles', function ($query) {
            $query->where('name', 'client')->where('guard_name', 'web');
        })->get();
    }
}
