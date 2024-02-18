<?php
require_once('C:\xampp\htdocs\Home work3\database\database.php');

try {
    session_start();

    if (!(isset($_POST['updatePost']) && isset($_SESSION['user_id']))) {
        throw new Exception("Error: Invalid request.");
    }

    $postId = $_POST['postId'];
    $title = $_POST['title'];
    $category = $_POST['category'];
    $date = $_POST['date'];
    $postContent = $_POST['post-content'];
    $userId = $_SESSION['user_id'];


    $db = new Database();
    $db->establishConnection();


    $query_update_post = "UPDATE post SET title='$title', category_id='$category', date='$date', post_content='$postContent' WHERE post_id='$postId'";
    $result_update_post = $db->update_record($query_update_post);

    if (!$result_update_post) {
        throw new Exception("Error updating post: ");
    }


    echo "Post updated successfully.";

} catch (Exception $e) {
    echo $e->getMessage();
}finally{
    $db->closeConnection();
}
?>
