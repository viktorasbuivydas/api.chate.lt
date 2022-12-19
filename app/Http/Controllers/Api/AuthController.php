<?php

namespace App\Http\Controllers\Api;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Http\Controllers\Controller;
use App\Http\Requests\Auth\LoginRequest;
use App\Http\Requests\Auth\RegisterRequest;
use App\Services\Interfaces\AuthServiceInterface;

class AuthController extends Controller
{
    protected AuthServiceInterface $authService;

    public function __construct(
        AuthServiceInterface $authService
    ) {
        $this->authService = $authService;
    }

    public function createUser(RegisterRequest $request): JsonResponse
    {
        return $this->authService->register(
            [
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]
        );
    }

    /**
     * Login The User
     *
     * @param  Request  $request
     * @return User
     */
    public function loginUser(LoginRequest $request): JsonResponse
    {
        return $this->authService->login(
            [
                'email' => $request->input('email'),
                'password' => $request->input('password'),
            ]
        );
    }

    public function logout()
    {
        return $this->authService->logout();
    }
}
