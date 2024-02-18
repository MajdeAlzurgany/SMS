<?php
    session_start();
    require_once('../../database/database.php');
    
    try {
        if (!isset($_SESSION['user_id']) || !isset($_POST['postId'])) {
            throw new Exception("Something wrong happened... Please try again later!");
        }
    
        $postId = $_POST['postId'];
    
        $myDB = new Database();
        $myDB->establishConnection();
        $myDB->startTransaction();   //transaction
    

        $query1 = "DELETE FROM comment WHERE post_id = '$postId'";
        $myDB->query_exexute($query1); //delte comments

       
        $query2 = "DELETE FROM post WHERE post_id='$postId' ";
        $myDB->query_exexute($query2); //delete post 
        
        $myDB->commit();

        
    
        header("Location: ../../user interfaces/Search.php "); // return it to the search page 
        exit(); 
    
    } catch (Exception $e) {
        echo $e->getMessage();
        $myDB->rollback(); 
    } finally {
        $myDB->closeConnection();
    }
    
?>
