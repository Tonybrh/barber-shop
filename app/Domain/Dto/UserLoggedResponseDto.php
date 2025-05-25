<?php

namespace App\Domain\Dto;

use App\Http\Resources\UserResource;

class UserLoggedResponseDto
{
    public function __construct(
        public string $accessToken,
        public string $tokenType,
        public UserResource $user
    ) {
    }
}
