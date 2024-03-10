<?php
require_once('../sql/voteSql.php');
require_once('voteclass.php');

try {
    if (!isset($_POST['submit'])) {
        throw new Exception('You should submit the form!');
    }

    if (!isset($_POST['userid']) &&  !isset($_POST['postid']) && !isset($_POST['vote'])) {
        throw new Exception('Fill the fields that are required.');
    }

    $vote = new Vote(
        $_POST['userid'],
        $_POST['postid'],
        $_POST['vote']
    ); //creating vote instance 

    VoteSql :: insertVote($vote); // pass it to function that insert it in db

    //$vote->displayVoteDetails();

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
