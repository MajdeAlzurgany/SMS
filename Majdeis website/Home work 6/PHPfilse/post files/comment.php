<?php
require_once('../sql/commentSql.php');
require_once('../post files/commentclass.php');

try {
    if (!isset($_POST['submit'])) {
        throw new Exception('You should submit the form!');
    }

    if (empty($_POST['postid']) || empty($_POST['userid']) || empty($_POST['commentText'])) {
        throw new Exception('Fill the fields that are required.');
    }

    $date = date("Y-m-d");
    $time = date("H:i:s");
    $postid = $_POST['postid'];
    $userid = $_POST['userid'];
    $commentText= $_POST['commentText'];


    $comment = new Comment(
        $userid,
        $postid,
        $date,
        $time,
        $commentText
    );

    //$comment->displayCommentContent();

    commentSql :: insertComment($comment);

} catch (Exception $e) {
    echo $e->getMessage();
}
?>