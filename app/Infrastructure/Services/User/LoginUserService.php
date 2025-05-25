<?php

namespace App\Infrastructure\Services\User;

use App\Domain\Dto\UserLoggedResponseDto;
use App\Domain\Models\User;
use App\Http\Requests\LoginUserRequest;
use App\Http\Resources\UserResource;
use Illuminate\Support\Facades\Hash;
use Symfony\Component\HttpFoundation\Response;

class LoginUserService
{
    public function __invoke(LoginUserRequest $request): UserLoggedResponseDto | Response
    {
        $user = User::where('email', $request->email)->first();

        if (!$user || !Hash::check($request->password, $user->password)) {
            return response()->json(['message' => 'Login ou senha inválidos'], Response::HTTP_UNAUTHORIZED);
        }

        $user->tokens()->delete();

        $token = $user->createToken('auth_token')->plainTextToken;

        return new UserLoggedResponseDto($token, 'Bearer', new UserResource($user));
    }
}
