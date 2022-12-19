<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\UserResource;
use App\Http\Resources\UserAboutResource;
use App\Http\Requests\User\PasswordRequest;
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

        return new UserAboutResource($user);
    }

    public function changePassword(PasswordRequest $request)
    {
        return $this->userService->updateUserPassword(
            $request->input('password'),
            $request->input('new_password')
        );
    }
}
