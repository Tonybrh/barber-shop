<?php

namespace App\Infrastructure\Services\User;

use App\Domain\Dto\UserLoggedResponseDto;
use App\Domain\Models\User;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\UserResource;
use Symfony\Component\HttpFoundation\Response;

class LoginUserService
{
    public function __invoke(LoginUserRequest $request): UserLoggedResponseDto | Response
    {
        $user = User::where('email', $request->email)->first();

        $token = auth()->attempt($request->validated());

        if (!$user || !$token) {
            return response()->json(['message' => 'Login ou senha inválidos'], Response::HTTP_UNAUTHORIZED);
        }

        return new UserLoggedResponseDto($token, 'Bearer', new UserResource($user));
    }
}
