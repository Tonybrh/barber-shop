<?php

namespace App\Http\Controller\Auth;

use Symfony\Component\HttpFoundation\JsonResponse;

class LoginPostAction
{
    public function __invoke(): JsonResponse
    {
        return new JsonResponse(['message' => 'Hello World!']);
    }
}
