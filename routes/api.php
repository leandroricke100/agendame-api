<?php

use App\Http\Controllers\Auth\LoginControler;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post('/login', LoginControler::class)->name('login'); // __invoke()

// Route::post('/login', LoginControler::class)->name('login');

// Route::get('/user', function (Request $request) {
//     return $request->user();
// })->middleware('auth:sanctum');
