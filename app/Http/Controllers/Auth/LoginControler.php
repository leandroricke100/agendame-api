<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;

class LoginControler extends Controller
{
    public function __invoke()
    {
        $login = [
            'email' => 'test@example.com',
            'password' => 'password',
        ];

        if (auth()->attempt($login)) {
            request()->session()->regenerate();

            return auth()->user();
        }
    }
}
