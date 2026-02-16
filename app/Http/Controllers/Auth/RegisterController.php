<?php

namespace App\Http\Controllers\Auth;

use App\Exceptions\userHasBeenTakenException;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\RegisterRequest;
use App\Http\Resources\UserResource;
use App\Models\User;
use Illuminate\Http\Request;

class RegisterController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param  \App\Http\Requests\Auth\RegisterRequest  $request
     * @return \App\Http\Resources\UserResource
     * @throws \App\Exceptions\userHasBeenTakenException
     */
    public function __invoke(RegisterRequest $request)
    {
        // sleep(2);
        $input = $request->validated();

        if (User::query()->whereEmail($input['email'])->exists()) {
            throw new userHasBeenTakenException();
        }

        $input['password'] = bcrypt($input['password']);
        $user = User::query()->create($input);

        return new UserResource($user);
    }
}
