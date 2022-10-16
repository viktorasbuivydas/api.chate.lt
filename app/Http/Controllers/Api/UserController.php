<?php

namespace App\Http\Controllers\Api;

use App\Domains\Authorization\Models\User;
use App\Domains\Authorization\Resources\UserResource;
use App\Http\Controllers\Controller;

class UserController extends Controller
{
    public function user()
    {
        $user = User::find(auth()->id());

        return new UserResource($user);
    }
}
