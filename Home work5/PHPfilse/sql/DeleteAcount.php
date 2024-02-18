<?php
    require_once('../../database/database.php');
    session_start();
    try {
        if (!isset($_SESSION['user_id'])) {
            throw new Exception("Something wrong happened... Please try again later!");
        }
        $userId = $_SESSION['user_id'];
        $query1="DELETE FROM post WHERE user_id = '$userId'";
        $query2="DELETE FROM phonenumber WHERE user_id = '$userId'";
        $query3 = "DELETE FROM users WHERE user_id = '$userId'";

        $myDB = new Database();
        $myDB->establishConnection();
        $myDB->query_exexute($query1);
        $myDB->query_exexute($query2);
        $myDB->query_exexute($query3);

        header("Location: ../../user interfaces/logout.php");

    } catch (Exception $e) {
        echo $e->getMessage();
    }finally{
        $myDB->closeConnection();
    }
?>
