<?php

use App\Http\Controller\Reservation\CreateReservationPostAction;
use Illuminate\Support\Facades\Route;

Route::prefix('reservation')->middleware(['auth:sanctum', 'verified'])->group(function () {
    Route::post('/create', CreateReservationPostAction::class)->name('reservation.create');
});
