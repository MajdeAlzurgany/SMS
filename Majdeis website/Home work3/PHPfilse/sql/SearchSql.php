<?php
require_once('C:\xampp\htdocs\Home work3\database\database.php');
require_once('C:\xampp\htdocs\Home work3\PHPfilse\search and update files\searchclass.php');
require_once ('C:\xampp\htdocs\Home work3\PHPfilse\search and update files\serach.php');
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
    
            $query = "SELECT * FROM post WHERE category_id='$category' OR date='$date' OR post_content='$postContent' OR title='$title' AND user_id='$userId'";
            $result = $myDB->query_exexute($query);
    
            ?>
            <table border='1'>
                <tr>
                    <th>userID</th>
                    <th>Title</th>
                    <th>Category</th>
                    <th>Date</th>
                    <th>Post Content</th>
                    <th>Edit</th>
                </tr>
            <?php
    
            while ($row = $result->fetch_array(MYSQLI_ASSOC)) {
                ?>
                <tr>
                    <td><?php echo $row['user_id']; ?></td>
                    <td><?php echo $row['title']; ?></td>
                    <td><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['date']; ?></td>
                    <td><?php echo $row['post_content']; ?></td>
                    <td><a href='../../user interfaces/edit_post.php ?id=<?php echo $row['post_id']; ?>'>Edit</a></td>
                </tr>
                <?php
            }
    
            ?>
            </table>
            <?php
    
        } catch (Exception $e) {
            echo "An error occurred: " . $e->getMessage();
        } finally {
            $myDB->closeConnection();
        }
    }

    
}

?> 
