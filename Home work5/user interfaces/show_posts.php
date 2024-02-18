<?php
require_once("../PHPfilse/sql/postSql.php");
require_once("../PHPfilse/sql/commentSql.php");
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Posts</title>
    <link rel="stylesheet" href="../CSSfiles/post_styles.css"> 
    <link rel="stylesheet" href="../CSSfiles/matchedStyles.css"> 
</head>
<body>
    <header>
        <h1><a href="../HTMLfiles/index.html">Posts</a></h1>
        <div class="user-info">
            <?php
            try {
                if(isset($_SESSION['username']) && isset($_SESSION['user_id'])) {
                    $userid= $_SESSION['user_id'];
                    echo '<span>Welcome, ' . $_SESSION['username'] . '</span>';
                } else {
                    throw new Exception("User session not found.");
                }
            } catch (Exception $e) {
                echo "Error: " . $e->getMessage();
                header("Location: signIn.php");
                exit(); 
            }
            ?>
            <a href="logout.php" class="logout-button">Log Out</a>
        </div>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a target="_blank" href="writepost.php">Add Post</a></li>
            <li><a href="search.php">Search posts</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        </ul>
    </nav>
    
    <div class="post-container">
        <?php
        try {

            if(isset($_SESSION['post_ids'])) {
                $postIds = $_SESSION['post_ids'];
                // Call the function to fetch posts
                $posts = postSql::fetchPosts($postIds);

                foreach($posts as $post) {  
                    // Display the posts
                    echo "<div class='post'>";
                        echo "<div class='user-profile'>";
                            echo "<img class='blank-profile' src='../Project Pictures/blank-profile.webp' alt='username'>";
                            echo "<h2 class='username'>" . $post['username'] . "</h2>";
                        echo "</div>";
                        echo "<hr>";
                        echo "<h3 class='post-title'>" . $post['title'] . "</h3>";
                        echo "<p class='post-meta'>Category: " . $post['categoryType'] . " | Date: " . $post['date'] . "</p>";
                        echo "<p class='post-content'>" . $post['postContent'] . "</p>";
                        echo "<hr>";
                        
                        echo "<div class = 'comments'> ";
                            echo "<a class='comment-link' href='comment.php?id=" . $post['postId'] . "'>Comment</a>";
                            echo "Number of comments : " .  commentSql ::countCommentsByPostId($post['postId']); // get the number of comments of this post
                            echo "<hr>";  
                        echo "</div>";

                        $comments = commentSql::getCommentsByPostId($post['postId']); //get array of comments of this post
                        foreach ($comments as $comment) {
                            echo "<div class='comment'>";
                            echo "<div class='user-comment-info'>";
                            echo "<img class='blank-profile' src='../Project Pictures/blank-profile.webp' alt='username'>";
                                echo "<h5>" . $comment['user_name'] . "</h5>";
                            echo "</div>";
                            echo "<p>" . $comment['comment_content'] . "</p>";
                            echo "</div>";
                        }

                        // Check if the post belongs to the current user
                        if($userid == $post['userId']) {
                            // If yes, display the edit and delete buttons
                            echo "<form method='post' action='edit_post.php'>";
                            echo "<input type='hidden' name='postId' value='" . $post['postId'] . "'>";
                            echo "<input type='submit' name='edit' value='Edit' class='edit-button'>"; 
                            echo "</form>";
                            
                            echo "<form method='post' action='../PHPfilse/sql/delete_post.php'>";
                            echo "<input type='hidden' name='postId' value='" . $post['postId'] . "'>";
                            echo "<input type='submit' name='delete' value='Delete' class='delete-button'>"; 
                            echo "</form>";
                        }
                    echo "</div>";
                }
            } else {
                throw new Exception("No posts to display.");
            }
        } catch (Exception $e) {
            echo "Error: " . $e->getMessage();
        }
        ?>
    </div>

    <footer>
        <div class="social-media">
            <a href="https://facebook.com" target="_blank"><img class="face" src="../Project Pictures/face.webp" alt="facebook icon"></a>
            <a href="https://instagram.com" target="_blank"><img class="insta" src="../Project Pictures/Insta.webp" alt="instagram icon"></a>
            <a href="https://youtube.com" target="_blank"><img class="youtube" src="../Project Pictures/youtube.png" alt="youtube icon"></a>
            <a href="https://web.telegram.org/a/" target="_blank"><img class="tele" src="../Project Pictures/Telegram.webp" alt="telegram icon"></a>
            <a href="https://whatsapp.com" target="_blank"><img class="whats" src="../Project Pictures/whats.png" alt="whatsapp icon"></a>
        </div>
        <div class="copyright">
            &copy; 2024 Your Website. All rights reserved.
        </div>
        <p class="info">
            <div>Phone number : 0919353046</div>
            <div>Email : majde.zr@gmail.com </div>
            <div> company Locatin : Libya - Tripoli </div>
        </p>
    </footer>
</body>
</html>
