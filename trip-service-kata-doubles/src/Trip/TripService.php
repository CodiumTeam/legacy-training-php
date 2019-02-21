<?php

namespace TripServiceKata\Trip;

use TripServiceKata\User\User;
use TripServiceKata\User\UserSession;
use TripServiceKata\Exception\UserNotLoggedInException;

class TripService
{
    /** @var UserSession  */
    private $userSession;
    /** @var TripRepository  */
    private $tripRepository;

    public function __construct(UserSession $userSession, TripRepository $tripRepository)
    {
        $this->tripRepository = $tripRepository;
        $this->userSession = $userSession;
    }

    /**
     * @param User $user
     * @return array
     * @throws UserNotLoggedInException
     */
    public function getTripsByUser(User $user) {
        $tripList = array();
        $isFriend = false;
        $loggedUser = $this->userSession->getLoggedUser();
        if ($loggedUser != null) {
            foreach ($user->getFriends() as $friend) {
                if ($friend == $loggedUser) {
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
