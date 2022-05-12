<?php

namespace App\Model;

interface UserRepository
{
    public function save(User $user): void;

    /** @throws UserNotFoundException */
    public function searchByPk(string $email): User;
}
