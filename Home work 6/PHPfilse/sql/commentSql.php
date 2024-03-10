<?php
require_once('C:\xampp\htdocs\Home work\database\database.php');
class commentSql{

    function __construct(){}

    public static function insertComment($comment){
        try{
            $userid=$comment->getUserId();
            $postid=$comment->getPostId();
            $date=$comment->getDate();
            $time=$comment->getTime();
            $commentText=$comment->getCommentText();

            $myDB = new database();
            $myDB->establishConnection();
        //add the comment to the db
            $query = "INSERT INTO comment (user_id, post_id, time, date,comment_content) 
                        VALUES ('$userid','$postid', '$date', '$time','$commentText')";
            $myDB->query_exexute($query);

            echo "<p>the you are commented seccusfully on this post </p>";
        }catch(Exception $e){
            $e->getMessage();
        }finally{
            $myDB->closeConnection();
        }
    }

    public static function getCommentsByPostId($postid) {
        try {
            $myDB = new database();
            $myDB->establishConnection();
    
            //query to join the comment and users tables
            $query = "SELECT comment.*, users.user_name 
                      FROM comment 
                      JOIN users ON comment.user_id = users.user_id 
                      WHERE post_id = '$postid'";
            $result = $myDB->query_exexute($query);
    
            $comments = array();
            while ($row = $result->fetch_assoc()) {
                $comments[] = $row;   // store all comments of the post 
            }
    
            return $comments;  //return it to the show_posts
        } catch(Exception $e) {
            echo $e->getMessage();
            return array();
        } finally {
            $myDB->closeConnection();
        }
    }

    public static function countCommentsByPostId($postid) {
        try {
            $myDB = new database();
            $myDB->establishConnection();
    
            $query = "SELECT COUNT(*) AS comment_count FROM comment WHERE post_id = '$postid'";
            $result = $myDB->query_exexute($query);
            $row = $result->fetch_assoc();
            $commentCount = $row['comment_count'];
    
            return $commentCount;
        } catch(Exception $e) {
            echo $e->getMessage();
            return 0;
        } finally {
            $myDB->closeConnection();
        }
    }
}

?>
