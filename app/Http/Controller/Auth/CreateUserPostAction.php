<?php

namespace App\Http\Controller\Auth;

use App\Http\Requests\CreateUserRequest;
use Symfony\Component\HttpFoundation\JsonResponse;

class CreateUserPostAction
{
    public function __invoke(CreateUserRequest $request): JsonResponse
    {
        return new JsonResponse(['message' => 'Hello World!']);
    }
}
