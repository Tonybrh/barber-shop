<?php

namespace App\Infrastructure\Services;

use App\Domain\Dto\UserLoggedResponseDto;
use App\Domain\Models\User;
use App\Http\Requests\CreateUserRequest;

class CreateUserService
{
    public function __invoke(CreateUserRequest $request): UserLoggedResponseDto
    {
        $user = User::query()->create($request->validated());

        return new UserLoggedResponseDto(
            $user->createToken('auth_token')->plainTextToken,
            'Bearer'
        );
    }
}
