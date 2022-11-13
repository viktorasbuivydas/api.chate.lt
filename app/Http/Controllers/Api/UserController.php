<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\User\UserResource;
use App\Services\Interfaces\UserServiceInterface;

class UserController extends Controller
{
    protected UserServiceInterface $userService;

    public function __construct(UserServiceInterface $userService)
    {
        $this->userService = $userService;
    }

    public function user()
    {
        $user = $this->userService->getLoggedInUserData();

        return new UserResource($user);
    }

    public function getSelectedUsernameUserData(string $username)
    {
        $user = $this->userService->getSelectedUsernameUserData($username);

        return new UserResource($user);
    }
}
