<?php

namespace App\UseCase;

use App\Infrastructure\DoctrineUserRepository;
use App\Model\User;
use App\Model\UserNotFoundException;
use App\Model\UserRepository;

class UserOrmRepositoyAdapter implements UserRepository
{
    private DoctrineUserRepository $orm;

    /**
     * @param $orm
     */
    public function __construct(DoctrineUserRepository $orm)
    {
        $this->orm = $orm;
    }

    public function save(User $user): void
    {
        $this->orm->save($user);
    }

    public function searchByPk(string $email): User
    {
        $user = $this->orm->findByEmail($email);

        if ($user === null) {
            throw new  UserNotFoundException();
        }
        return $user;
    }
}
