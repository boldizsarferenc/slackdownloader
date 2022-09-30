<?php

namespace App\RemoteUserBundle\Application\GetUserByEmail;

use App\RemoteUserBundle\Application\Exception\UserNotFoundException;
use App\RemoteUserBundle\Domain\User;
use App\RemoteUserBundle\Domain\UserRepositoryInterface;

class GetUserByEmailHandler
{
    private UserRepositoryInterface $userRepository;

    public function __construct(UserRepositoryInterface $userRepository)
    {
        $this->userRepository = $userRepository;
    }

    /**
     * @throws UserNotFoundException
     */
    public function __invoke(GetUserByEmailQuery $query): User
    {
        $user = $this->userRepository->getUserByEmail($query->getEmail());

        if (!$user) {
            throw new UserNotFoundException($query->getEmail());
        }

        return $user;
    }
}
