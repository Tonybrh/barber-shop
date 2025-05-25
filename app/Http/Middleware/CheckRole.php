<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    public function handle(Request $request, Closure $next, ...$roles)
    {
        $userRoles = auth()->user()->roles->pluck('name')->toArray();

        if (empty(array_intersect($userRoles, $roles))) {
            abort(Response::HTTP_FORBIDDEN, 'Acesso negado.');
        }

        return $next($request);
    }
}
