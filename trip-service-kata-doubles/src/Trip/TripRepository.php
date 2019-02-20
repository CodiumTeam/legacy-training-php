<?php

namespace TripServiceKata\Trip;

use TripServiceKata\User\User;

interface TripRepository
{
    public static function findTripsByUser(User $user);
}