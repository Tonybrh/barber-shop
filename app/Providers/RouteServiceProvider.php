<?php

namespace App\Providers;

use Illuminate\Support\Facades\Route;
use Illuminate\Foundation\Support\Providers\RouteServiceProvider as ServiceProvider;

class RouteServiceProvider extends ServiceProvider
{
    public const HOME = '/dashboard';

    public function boot(): void
    {
        $this->routes(function () {
            Route::prefix('api')
                ->middleware('api')
                ->middleware('api')
                ->group(function () {
                    require base_path('routes/api.php');
                    require base_path('routes/auth.php');
                } );

            Route::prefix('web')
                ->middleware('web')
                ->group(function () {
                    require base_path('routes/web.php');
                });
        });
    }
}
