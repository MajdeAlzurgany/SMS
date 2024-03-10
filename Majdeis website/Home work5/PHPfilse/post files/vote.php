<?php
require_once('voteclass.php');

try {
    if (!isset($_POST['submit'])) {
        throw new Exception('You should submit the form!');
    }

    if (empty($_POST['voterName']) || empty($_POST['vote'])) {
        throw new Exception('Fill the fields that are required.');
    }

    $vote = new Vote(
        $_POST['voterName'],
        $_POST['vote']
    );

    //$vote->displayVoteDetails();

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
