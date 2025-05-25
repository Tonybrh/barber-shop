<?php

use App\Http\Controller\Barber\ViewReservationsGetAction;
use App\Http\Controller\BarberService\CreateServicePostAction;
use App\Http\Controller\Client\AllClientGetAction;
use App\Http\Controller\Reservation\CreateReservationPostAction;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

Route::middleware('auth:sanctum')->group(function () {
    Route::prefix('reservation')
        ->group(function () {
            Route::post('/create', CreateReservationPostAction::class)->name('reservation.create');
            Route::get('/list', ViewReservationsGetAction::class)->name('reservation.list')
                ->middleware(CheckRole::class.':admin,barber');
        });

    Route::middleware(CheckRole::class.':admin,barber')->group(function () {
        Route::prefix('service')->group(function() {
            Route::post('/create', CreateServicePostAction::class)->name('service.create');
        });

        Route::get('/clients', AllClientGetAction::class)->name('client.list');
    });

});


