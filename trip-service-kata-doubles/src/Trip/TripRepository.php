<?php

namespace TripServiceKata\Trip;

use TripServiceKata\User\User;

interface TripRepository
{
    public function findTripsByUser(User $user);
}