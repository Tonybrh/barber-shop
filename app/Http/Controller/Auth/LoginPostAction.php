<?php

namespace App\Http\Controller\Auth;

use App\Http\Requests\LoginUserRequest;
use App\Infrastructure\Services\User\LoginUserService;
use Symfony\Component\HttpFoundation\JsonResponse;
use Symfony\Component\HttpFoundation\Response;

readonly class LoginPostAction
{
    public function __construct(
        private LoginUserService $loginUserService
    ) {
    }

    public function __invoke(LoginUserRequest $request): JsonResponse
    {
        return new JsonResponse(
            ($this->loginUserService)($request),
            Response::HTTP_OK
        );
    }
}
