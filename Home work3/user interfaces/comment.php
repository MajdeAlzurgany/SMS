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
            if(isset($_SESSION['username'])) {
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
            <li><a target="_blank" href="writepost.php">Add Post</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="comment.php">Comment</a></li>
            <li><a href="vote.php">Vote</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        
        </ul>
    </nav>
    
    <main>
        <div class="write-comment-form">
            <h2>Write a Comment</h2>
            <form action="../PHPfilse/comment.php" method="POST">
                <input type="hidden" name="commenterName" value="guest">
                
                <label for="user"> <?php echo $_SESSION['username'] ?> <img class="blank-profile" src="../Project's Pictures/blank-profile.webp" alt="username"></label>
    
                <label for="commentText">Comment:</label>
                <textarea id="commentText" name="commentText" rows="4" placeholder="write a comment!" required></textarea>
    
                <button type="submit" name="submit">Submit Comment</button>
            </form>
        </div>
    </main>
    
    

    <footer>
        <div class="social-media">
            <a href="https://facebook.com" target="_blank"><img class="face" src="../Project's Pictures/face.webp" alt="facebook icon"></a>
            <a href="https://instagram.com" target="_blank"><img class="insta" src="../Project's Pictures/Insta.webp" alt="instagram icon"></a>
            <a href="https://youtube.com" target="_blank"><img class="youtube" src="../Project's Pictures/youtube.png" alt="youtube icon"></a>
            <a href="https://web.telegram.org/a/" target="_blank"><img class="tele" src="../Project's Pictures/Telegram.webp" alt="telegram icon"></a>
            <a href="https://whatsapp.com" target="_blank"><img class="whats" src="../Project's Pictures/whats.png" alt="whatsapp icon"></a>
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
