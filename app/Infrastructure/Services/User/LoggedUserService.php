<?php

namespace App\Infrastructure\Services\User;

use App\Domain\Models\User;
use App\Domain\Service\LoggedUserServiceInterface;
use Illuminate\Support\Facades\Auth;

class LoggedUserService implements LoggedUserServiceInterface
{
    public function __construct(
        private ?User $user
    ) {
        $this->user = Auth::user();
    }

    public function getId(): ?int
    {
        return $this->user?->id;
    }
    public function getName(): ?string
    {
        return $this->user?->name;
    }

    public function getEmail(): ?string
    {
        return $this->user?->email;
    }

    public function getPhone(): ?string
    {
        return $this->user?->phone;
    }
}
