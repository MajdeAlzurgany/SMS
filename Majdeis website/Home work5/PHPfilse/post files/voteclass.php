<?php

class Vote {
    private $voterName, $vote;

    public function __construct($voterName, $vote) {
        $this->voterName = $voterName;
        $this->vote = $vote;
    }

    public function getVoterName() {
        return $this->voterName;
    }

    public function getVote() {
        return $this->vote;
    }

    public function displayVoteDetails() {
        echo "Voter Name: " . $this->voterName . "<br>";
        echo "Vote: " . $this->vote . "<br>";
    }
    
}

?>
