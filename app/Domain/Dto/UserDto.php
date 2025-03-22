<?php

namespace App\Domain\Dto;

use App\Http\Requests\CreateUserRequest;

class UserDto
{
    public function __construct(
        public string $name,
        public string $email,
        public string $password,
        public string $phone,
        public int $userType
    ) {
    }

    public static function fromRequest(CreateUserRequest $request): self
    {
        $validatedRequest = $request->validated();

        return new self(
            name: $validatedRequest['name'],
            email: $validatedRequest['email'],
            password: $validatedRequest['password'],
            phone: bcrypt($validatedRequest['phone']),
            userType: $validatedRequest['user_type']
        );
    }
}
