<?php

namespace App\Http\Controllers;

use App\Http\Requests\UserRequest;
use App\Http\Resources\UserResource;
use App\User;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
    public function login()
    {
        $user = User::where('phone_number', request('phone_number'))->first();

        if (Hash::check(request('password'), $user->password)) {
            return new UserResource($user);
        }

        return abort(401);
    }
    public function store(UserRequest $request)
    {
        return new UserResource(User::registerUserWithShop($request->validated()));
    }
}
