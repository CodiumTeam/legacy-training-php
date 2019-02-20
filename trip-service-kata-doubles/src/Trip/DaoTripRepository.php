<?php

namespace TripServiceKata\Trip;

use TripServiceKata\User\User;

class DaoTripRepository implements TripRepository
{
    public static function findTripsByUser(User $user)
    {
        return TripDAO::findTripsByUser($user);
    }
}