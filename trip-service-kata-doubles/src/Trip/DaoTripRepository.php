<?php

namespace TripServiceKata\Trip;

use TripServiceKata\User\User;

class DaoTripRepository implements TripRepository
{
    public function findTripsByUser(User $user)
    {
        return TripDAO::findTripsByUser($user);
    }
}