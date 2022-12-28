<?php

namespace App\Services;

use Illuminate\Support\Arr;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use App\Services\Interfaces\AuthServiceInterface;
use App\Repositories\Interfaces\UserRepositoryInterface;

class AuthService extends BaseService implements AuthServiceInterface
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    public function login(array $data): JsonResponse
    {
        $email = Arr::get($data, 'email');

        if (! Auth::attempt([
            'email' => $email,
            'password' => Arr::get($data, 'password'),
        ])) {
            return response()->json([
                'status' => false,
                'message' => 'Email & Password does not match with our record.',
            ], 401);
        }

        $user = $this->userRepository->findOneFromArray([
            'email' => $email,
        ]);

        return response()->json([
            'status' => true,
            'message' => 'User Logged In Successfully',
            'token' => $user->createToken('auth_token')->plainTextToken,
        ], 200);
    }

    public function register(array $data): JsonResponse
    {
        $user = $this->userRepository->createOrUpdateFromArray([
            'username' => Arr::get($data, 'username'),
            'email' => Arr::get($data, 'email'),
            'password' => Hash::make(Arr::get($data, 'password')),
        ]);

        abort_unless($user, 500);

        return response()->json([
            'status' => true,
            'token' => $user->createToken('API TOKEN')->plainTextToken,
        ], 200);
    }

    public function logout(): JsonResponse
    {
        request()->user()->currentAccessToken()->delete();

        return response()->json([
            'status' => true,
            'message' => 'User Logged Out Successfully',
        ], 200);
    }
}
