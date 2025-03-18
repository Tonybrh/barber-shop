<?php

use App\Http\Controller\Auth\CreateUserPostAction;
use App\Http\Controller\Auth\LoginPostAction;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginPostAction::class)->name('login');
Route::post('/register', CreateUserPostAction::class)->name('register');
