<?php

namespace Trivia;

include "Game.php";

class GameRunner
{
    public static function play()
    {
        $aGame = new Game();

        $aGame->add("Chet");
        $aGame->add("Pat");
        $aGame->add("Sue");

        do {

            $aGame->roll(rand(0, 5) + 1);

            if (rand(0, 9) == 7) {
                $notAWinner = $aGame->wrongAnswer();
            } else {
                $notAWinner = $aGame->wasCorrectlyAnswered();
            }
        } while ($notAWinner);
    }
}

GameRunner::play();
