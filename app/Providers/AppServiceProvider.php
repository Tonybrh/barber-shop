<?php

namespace App\Providers;

use App\Domain\Enum\UserTypeEnum;
use App\Domain\Models\User;
use App\Domain\Service\LoggedUserServiceInterface;
use App\Infrastructure\Services\User\LoggedUserService;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\ServiceProvider;
use JMS\Serializer\SerializerBuilder;
use JMS\Serializer\SerializerInterface;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        Gate::define('create-user', function (User $user) {
            return $user->user_type === UserTypeEnum::ADMIN;
        });

        $this->app->singleton(SerializerInterface::class, function () {
            return SerializerBuilder::create()->build();
        });

        $this->app->bind(
            LoggedUserServiceInterface::class,
            LoggedUserService::class
        );
    }
}
