<?php

namespace TripServiceKata\Trip;

use TripServiceKata\User\User;
use TripServiceKata\User\UserSession;
use TripServiceKata\Exception\UserNotLoggedInException;

class TripService
{
    /** @var UserSession  */
    private $loggedUser;
    /** @var TripRepository  */
    private $tripRepository;

    public function __construct(UserSession $loggedUser, TripRepository $tripRepository)
    {
        $this->tripRepository = $tripRepository;
        $this->loggedUser = $loggedUser;
    }

    /**
     * @param User $user
     * @return array
     * @throws UserNotLoggedInException
     */
    public function getTripsByUser(User $user) {
        $tripList = array();
        $isFriend = false;
        if ($this->loggedUser != null) {
            foreach ($user->getFriends() as $friend) {
                if ($friend == $this->loggedUser) {
                    $isFriend = true;
                    break;
                }
            }
            if ($isFriend) {
                $tripList = $this->tripRepository->findTripsByUser($user);
            }
            return $tripList;
        } else {
            throw new UserNotLoggedInException();
        }
    }
}
