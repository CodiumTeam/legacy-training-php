<?php
namespace Trivia;

class Game {
    var $players;
    var $places;
    var $purses ;
    var $inPenaltyBox ;

    var $popQuestions;
    var $scienceQuestions;
    var $sportsQuestions;
    var $rockQuestions;

    var $currentPlayer = 0;
    var $isGettingOutOfPenaltyBox;

    function  __construct(){

   	$this->players = array();
        $this->places = array(0);
        $this->purses  = array(0);
        $this->inPenaltyBox  = array(0);

        $this->popQuestions = array();
        $this->scienceQuestions = array();
        $this->sportsQuestions = array();
        $this->rockQuestions = array();

        for ($i = 0; $i < 50; $i++) {
			array_push($this->popQuestions, "Pop Question " . $i);
			array_push($this->scienceQuestions, ("Science Question " . $i));
			array_push($this->sportsQuestions, ("Sports Question " . $i));
			array_push($this->rockQuestions, $this->createRockQuestion($i));
    	}
    }

	function createRockQuestion($index){
		return "Rock Question " . $index;
	}

	function isPlayable() {
		return ($this->howManyPlayers() >= 2);
	}

	function add($playerName) {
	   array_push($this->players, $playerName);
	   $this->places[$this->howManyPlayers()] = 0;
	   $this->purses[$this->howManyPlayers()] = 0;
	   $this->inPenaltyBox[$this->howManyPlayers()] = false;

        echo $playerName . " was added" . "\n";
        echo "They are player number " . count($this->players) . "\n";
        return true;
	}

	function howManyPlayers() {
		return count($this->players);
	}

	function  roll($roll) {
        echo $this->players[$this->currentPlayer] . " is the current player" . "\n";
        echo "They have rolled a " . $roll . "\n";

        if ($this->inPenaltyBox[$this->currentPlayer]) {
			if ($roll % 2 != 0) {
				$this->isGettingOutOfPenaltyBox = true;

                echo $this->players[$this->currentPlayer] . " is getting out of the penalty box" . "\n";
                $this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] + $roll;
				if ($this->places[$this->currentPlayer] > 11) $this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] - 12;

                echo $this->players[$this->currentPlayer]
                    . "'s new location is "
                    . $this->places[$this->currentPlayer] . "\n";
                echo "The category is " . $this->currentCategory() . "\n";
                $this->askQuestion();
			} else {
                echo $this->players[$this->currentPlayer] . " is not getting out of the penalty box" . "\n";
                $this->isGettingOutOfPenaltyBox = false;
				}

		} else {

		$this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] + $roll;
			if ($this->places[$this->currentPlayer] > 11) $this->places[$this->currentPlayer] = $this->places[$this->currentPlayer] - 12;

            echo $this->players[$this->currentPlayer]
                . "'s new location is "
                . $this->places[$this->currentPlayer] . "\n";
            echo "The category is " . $this->currentCategory() . "\n";
            $this->askQuestion();
		}

	}

	function  askQuestion() {
		if ($this->currentCategory() == "Pop") {
            echo array_shift($this->popQuestions) . "\n";
        }
		if ($this->currentCategory() == "Science") {
            echo array_shift($this->scienceQuestions) . "\n";
        }
		if ($this->currentCategory() == "Sports") {
            echo array_shift($this->sportsQuestions) . "\n";
        }
		if ($this->currentCategory() == "Rock") {
            echo array_shift($this->rockQuestions) . "\n";
        }
	}


	function currentCategory() {
		if ($this->places[$this->currentPlayer] == 0) return "Pop";
		if ($this->places[$this->currentPlayer] == 4) return "Pop";
		if ($this->places[$this->currentPlayer] == 8) return "Pop";
		if ($this->places[$this->currentPlayer] == 1) return "Science";
		if ($this->places[$this->currentPlayer] == 5) return "Science";
		if ($this->places[$this->currentPlayer] == 9) return "Science";
		if ($this->places[$this->currentPlayer] == 2) return "Sports";
		if ($this->places[$this->currentPlayer] == 6) return "Sports";
		if ($this->places[$this->currentPlayer] == 10) return "Sports";
		return "Rock";
	}

	function wasCorrectlyAnswered() {
		if ($this->inPenaltyBox[$this->currentPlayer]){
			if ($this->isGettingOutOfPenaltyBox) {
                echo "Answer was correct!!!!" . "\n";
                $this->purses[$this->currentPlayer]++;
                echo $this->players[$this->currentPlayer]
                    . " now has "
                    . $this->purses[$this->currentPlayer]
                    . " Gold Coins." . "\n";

                $winner = $this->didPlayerWin();
				$this->currentPlayer++;
				if ($this->currentPlayer == count($this->players)) $this->currentPlayer = 0;

				return $winner;
			} else {
				$this->currentPlayer++;
				if ($this->currentPlayer == count($this->players)) $this->currentPlayer = 0;
				return true;
			}



		} else {

            echo "Answer was corrent!!!!" . "\n";
            $this->purses[$this->currentPlayer]++;
            echo $this->players[$this->currentPlayer]
                . " now has "
                . $this->purses[$this->currentPlayer]
                . " Gold Coins." . "\n";

            $winner = $this->didPlayerWin();
			$this->currentPlayer++;
			if ($this->currentPlayer == count($this->players)) $this->currentPlayer = 0;

			return $winner;
		}
	}

	function wrongAnswer(){
        echo "Question was incorrectly answered" . "\n";
        echo $this->players[$this->currentPlayer] . " was sent to the penalty box" . "\n";
        $this->inPenaltyBox[$this->currentPlayer] = true;

		$this->currentPlayer++;
		if ($this->currentPlayer == count($this->players)) $this->currentPlayer = 0;
		return true;
	}


	function didPlayerWin() {
		return !($this->purses[$this->currentPlayer] == 6);
	}
}
