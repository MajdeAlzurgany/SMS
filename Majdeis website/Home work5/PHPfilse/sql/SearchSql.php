<?php
require_once('../../database/database.php');
require_once('../search/searchclass.php');
session_start();

class SearchSql {

    public function __construct() {}

    public static function searchPosts($toSearch) {
        $userId = $_SESSION['user_id'];
        try {
            $category = $toSearch->getCategory();
            $date = $toSearch->getDate();
            $postContent = $toSearch->getPostContent();
            $title = $toSearch->getTitle();
    
            $myDB = new Database();
            $myDB->establishConnection();
    
            $query = "SELECT * FROM post WHERE user_id='$userId'";
    
            if (!empty($category)) {   //this allow me to search according to what the user entered even if he let somthing empty
                $query .= " AND category_id='$category'";
            }
            if (!empty($date)) {
                $query .= " AND date='$date'";
            }
            if (!empty($postContent)) {
                $query .= " AND post_content='$postContent'";
            }
            if (!empty($title)) {
                $query .= " AND title='$title'";
            }
    
            $result = $myDB->query_exexute($query);
    
            if ($result && $result->num_rows > 0) {
                $postIds = array();
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $postIds[] = $row['post_id'];  //storing the ids of posts 
                }
                $_SESSION['post_ids'] = $postIds; 
                header("Location: ../../user interfaces/show_posts.php"); 
                exit(); 
                
            } else {
                throw new Exception("No posts to show according to your search.");
            }
    
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        } finally {
            $myDB->closeConnection();
        }
    }
    

    public static function searchUsersPosts($toSearch) {
        try {
            $category = $toSearch->getCategory();
            $date = $toSearch->getDate();
            $username = $toSearch->getUsername();
            $title = $toSearch->getTitle();
    
            $myDB = new Database();
            $myDB->establishConnection();
    
            $user_id = ''; // Initialize user_id to an empty string 
    
            if ($username != '') {   // take the User id from username if it entered 
                $query = "SELECT * FROM users WHERE user_name = '$username' ";
                $result = $myDB->query_exexute($query);
    
                if ($result && $result->num_rows > 0) {
                    $user = $result->fetch_array(MYSQLI_ASSOC);
                    $user_id = $user['user_id'];
                } else {
                    throw new Exception("User name does not exist.");
                }
            }
    
            $query = "SELECT * FROM post WHERE 1";   // now the query will implement according to the non null values 
    
            if (!empty($user_id)) { 
                $query .= " AND user_id='$user_id'";
            }
    
            if (!empty($category)) {
                $query .= " AND category_id='$category'";
            }
            if (!empty($date)) {
                $query .= " AND date='$date'";
            }
            if (!empty($title)) {
                $query .= " AND title='$title'";
            }
    
            $result = $myDB->query_exexute($query);
    
            if ($result && $result->num_rows > 0) {
                $postIds = array();
                while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                    $postIds[] = $row['post_id'];  /// returns array of IDs of posts 
                }
                $_SESSION['post_ids'] = $postIds;
                header("Location: ../../user interfaces/show_posts.php");
                exit();
            } else {
                throw new Exception("No posts to show according to your search.");
            }
    
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        } finally {
            $myDB->closeConnection();
        }
    }
    

    
}
?>
