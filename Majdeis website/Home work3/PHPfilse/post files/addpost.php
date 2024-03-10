<?php
session_start();
require_once('../sql/postSql.php');
require_once('post.php');

try {
    if (!isset($_POST['submit'])) {
        throw new Exception('You should submit the form!');
    }

    if (empty($_POST['Category']) || empty($_POST['post-content'])) {
        throw new Exception('Fill the fields that are required.');
    }

    $date = date("Y-m-d");
    $time = date("H:i:s");

    $post = new Post( //crate instance of post
        $_POST['Category'],
        $_POST['post-content'],
        $_POST['post-image'],
        $date,
        $time,
        $_POST['post-title']
    );

    $user_id=$_SESSION['user_id'];

    $postsql = new postSql($user_id);

    $postsql->insert_post($post); // insert the post



    //$post->displayPostContent();

    

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
