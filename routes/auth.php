<?php

use App\Http\Controller\Auth\CreateUserPostAction;
use App\Http\Controller\Auth\LoginPostAction;
use Illuminate\Foundation\Auth\EmailVerificationRequest;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginPostAction::class)->name('login');
Route::post('/register', CreateUserPostAction::class)->name('user.create');

Route::get('/email/verify', function() {
    return view('auth.verify-email');
})->middleware('auth:sanctum')->name('verification.notice');

Route::get('/email/verify/{id}/{hash}', function (EmailVerificationRequest $request) {
    $request->fulfill();

    return redirect('/');
})->middleware(['auth:sanctum', 'signed'])->name('verification.verify');

Route::post('/email/verification-notification', function (Request $request) {
    $request->user()->sendEmailVerificationNotification();

    return back()->with('message', 'Verification link sent!');
})->middleware(['auth:sanctum', 'throttle:6,1'])->name('verification.send');
