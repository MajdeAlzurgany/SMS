<?php
require_once('postclass.php');

try {
    if (!isset($_POST['submit'])) {
        throw new Exception('You should submit the form!');
    }

    if (empty($_POST['username']) || empty($_POST['Category']) || empty($_POST['post-content'])) {
        throw new Exception('Fill the fields that are required.');
    }

    $date = date("Y-m-d");
    $time = date("H:i:s");

    $post = new Post(
        $_POST['username'],
        $_POST['Category'],
        $_POST['post-content'],
        $_POST['post-image'],
        $date,
        $time
    );

    $post->displayPostContent();

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
