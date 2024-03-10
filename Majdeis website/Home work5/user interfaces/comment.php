<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSSfiles/matchedStyles.css">
    <link rel="stylesheet" href="../CSSfiles/commentStyle.css">
    <title>JoyJunction</title>
</head>
<body>
    <header>
        <h1><a href="../HTMLfiles/index.html">JoyJunction</a></h1>
        <div class="user-info">
            <?php
            session_start();
            if(isset($_GET['id'])){
                $postid=$_GET['id'] ;
            }
            if(isset($_SESSION['username']) && isset( $_SESSION['user_id'])) {
                $userid= $_SESSION['user_id'];
                echo '<span>Welcome, ' . $_SESSION['username'] . '</span>';
            } else {
                header("Location: signIn.php");
                exit(); 
            }
            
            ?>
            <a href="EditProfile.php" class="personal-info">Edit profile</a>
            <a href="logout.php" class="logout-button">Log Out</a>
        </div>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="search.php">Search posts</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        
        </ul>
    </nav>
    
    <main>
        <div class="write-comment-form">
            <h2>Write a Comment</h2>
            <form action="../PHPfilse/post files/comment.php" method="POST">
                <input type="hidden" name="userid" value="<?php echo $userid ; ?>">
                <input type="hidden" name="postid" value="<?php echo $postid ; ?>">
                
                <label for="user"> <img class="blank-profile" src="../Project Pictures/blank-profile.webp" alt="username"> <?php echo $_SESSION['username'] ?> </label>
    
                <label for="commentText">Comment:</label>
                <textarea id="commentText" name="commentText" rows="4" placeholder="write a comment!" required></textarea>
    
                <button type="submit" name="submit">Submit Comment</button>
            </form>
        </div>
    </main>
    
    

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
            <div>Company Locatin : Libya - Tripoli </div>
        </p>
    </footer>

</body>
</html>
