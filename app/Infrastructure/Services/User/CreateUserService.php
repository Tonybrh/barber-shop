<?php

namespace App\Infrastructure\Services\User;

use App\Domain\Dto\UserLoggedResponseDto;
use App\Domain\Models\User;
use App\Http\Requests\CreateUserRequest;

class CreateUserService
{
    public function __invoke(CreateUserRequest $request): UserLoggedResponseDto
    {
        $user = User::query()->create($request->validated());

        $token = auth()->login($user);

        $user->syncRoles($request->roles);

        return new UserLoggedResponseDto(
            $token,
            'Bearer',
            $user
        );
    }
}
