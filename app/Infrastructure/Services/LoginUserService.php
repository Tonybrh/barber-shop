<?php

namespace App\Infrastructure\Services;

use App\Domain\Dto\UserLoggedResponseDto;
use App\Domain\Exceptions\UserUnauthorizedException;
use App\Http\Requests\LoginUserRequest;
use Illuminate\Support\Facades\Auth;

class LoginUserService
{
    public function __invoke(LoginUserRequest $request): UserLoggedResponseDto
    {
        $credentials = $request->validated();

        if (!Auth::attempt($credentials)) {
            throw new UserUnauthorizedException();
        }

        $user = Auth::user();
        $token = $user->createToken('auth_token')->plainTextToken;

        return new UserLoggedResponseDto($token, 'Bearer');
    }
}
