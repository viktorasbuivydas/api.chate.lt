<?php

namespace App\Services;

use App\Repositories\Interfaces\UserRepositoryInterface;
use App\Services\Interfaces\UserServiceInterface;

class UserService extends BaseService implements UserServiceInterface
{
    protected UserRepositoryInterface $userRepository;

    public function __construct(
        UserRepositoryInterface $userRepository,
    ) {
        $this->userRepository = $userRepository;
    }

    public function getLoggedInUserData()
    {
        return $this->userRepository->findOneByPrimary(auth()->id());
    }

    public function getSelectedUsernameUserData(string $username)
    {
        $user = $this->userRepository->getUserByField('username', $username);

        abort_unless($user, 404);

        return $user;
    }
}
