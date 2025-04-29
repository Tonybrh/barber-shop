<?php

use App\Http\Controller\Barber\ViewReservationsGetAction;
use App\Http\Controller\Reservation\CreateReservationPostAction;
use Illuminate\Support\Facades\Route;
use App\Http\Middleware\CheckRole;

Route::prefix('reservation')->middleware(['auth:sanctum'])
    ->group(function () {
    Route::post('/create', CreateReservationPostAction::class)->name('reservation.create');
    Route::get('/list', ViewReservationsGetAction::class)->name('reservation.list')
        ->middleware(CheckRole::class.':root,barber');
});
