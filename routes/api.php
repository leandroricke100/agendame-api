<?php

use App\Http\Controllers\Auth\LoginControler;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\User\MeController;
use App\Mail\WelcomeMail;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginControler::class)->name('login');

Route::post('register', RegisterController::class);

Route::middleware(['auth:sanctum'])->group(function () {
    Route::get('me', [MeController::class, 'show']);
});


Route::post('email', function () {
    Mail::to('teste@teste.com')->send(new WelcomeMail());
});
