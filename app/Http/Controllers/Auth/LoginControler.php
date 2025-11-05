<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use Illuminate\Support\Facades\Auth;

class LoginControler extends Controller
{
    public function __invoke(LoginRequest $request)
    {
        $input = $request->validated();

        // $login = [
        //     'email' => 'test@example.com',
        //     'password' => 'password',
        // ];

        if (auth()->attempt($input)) {
            request()->session()->regenerate();

            return auth()->user();
        }
    }
}
