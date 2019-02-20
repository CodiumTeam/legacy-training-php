<?php

namespace App\Repository;

use App\Model\User;

class DoctrineUserRepository
{
    private $users;

    public function __construct()
    {
        $this->users = [];
    }

    public function findByEmail(string $email): ?User
    {
        return $this->users[$email] ?? null;
    }

    public function save(User $user): void
    {
        $this->users[$user->email()] = $user;
    }
}