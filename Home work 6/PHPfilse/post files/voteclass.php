<?php

class Vote {
    private $userid,$postid , $vote;

    public function __construct($userid, $postid , $vote) {
        $this->userid = $userid;
        $this->postid = $postid;
        $this->vote = $vote;
    }

    public function getUserId() {
        return $this->userid;
    }

    public function getVoteType() {
        return $this->vote;
    }

    public function getPostId() {
        return $this->postid;
    }

    public function displayVoteDetails() {
        echo "Voter id: " . $this->userid . "<br>";
        echo "Vote: " . $this->vote . "<br>";
    }
    
}

?>
