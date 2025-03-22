<?php

namespace App\Http\Controller\Auth;

use App\Http\Requests\CreateUserRequest;
use App\Infrastructure\Services\CreateUserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

readonly class CreateUserPostAction
{
    public function __construct(
        private CreateUserService $createUserService
    ) {
    }

    public function __invoke(CreateUserRequest $request): JsonResponse
    {
        return new JsonResponse(
            ($this->createUserService)($request),
            Response::HTTP_CREATED
        );
    }
}
