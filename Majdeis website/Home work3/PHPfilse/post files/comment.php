<?php
require_once('commentclass.php');

try {
    if (!isset($_POST['submit'])) {
        throw new Exception('You should submit the form!');
    }

    if (empty($_POST['commenterName']) || empty($_POST['commentText'])) {
        throw new Exception('Fill the fields that are required.');
    }

    $date = date("Y-m-d");
    $time = date("H:i:s");

    $comment = new Comment(
        $_POST['commenterName'],
        $_POST['commentText'],
        $date,
        $time
    );

    $comment->displayCommentContent();

} catch (Exception $e) {
    echo $e->getMessage();
}
?>