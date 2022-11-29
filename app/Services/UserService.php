<?php

namespace App\Services;

use App\Exceptions\PasswordDoesNotMatchException;
use App\Exceptions\UserNotFoundException;
use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;
use App\Traits\Response;
use Illuminate\Support\Facades\Hash;

class UserService extends BaseService implements UserServiceInterface
{
    use Response;

    protected UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    public function getLoggedInUserData()
    {
        return $this->userRepository->getUserData(auth()->id());
    }

    public function getSelectedUsernameUserData(string $username)
    {
        $user = $this->userRepository->getUserByField('username', $username);
        $user->load('roles');
        if (! $user) {
            throw new UserNotFoundException();
        }

        return $user;
    }

    public function updateUserPassword(string $password, string $newPassword)
    {
        $userId = auth()->id();

        $user = $this->userRepository->getUserByField('id', $userId);

        if (! Hash::check($password, $user->password)) {
            throw new PasswordDoesNotMatchException();
        }

        $this->userRepository->updateByPrimary($userId, [
            'password' => Hash::make($newPassword),
        ], false);

        return $this->success('Slaptažodis pakeistas sėkmingai');
    }

    public function getMessages(int $userId)
    {
        return $this->userRepository
            ->getMessages(auth()->id());
    }

    public function getNewMessages(int $userId)
    {
        return $this->userRepository
            ->getNewMessages(auth()->id());
    }

    public function getSentMessages(int $userId)
    {
        return $this->userRepository
            ->getSentMessages(auth()->id());
    }
}
