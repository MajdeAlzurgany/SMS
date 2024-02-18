
<?php 
    session_start();
    
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        header("Location: signIn.php");
        exit(); 
    }
    
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSSfiles/Style.css">
    <link rel="stylesheet" href="../CSSfiles/matchedStyles.css">
    <title>JoyJunction</title>
</head>
<body>
    <header>
        <h1><a href="index.php">JoyJunction</a></h1>
        <div class="user-info">
            <?php
                echo '<span>Welcome, ' . $_SESSION['username'] . '</span>';
                echo $_SESSION['user_id'];
            ?>
            <a href="EditProfile.php" class="personal-info">Edit profile</a>
            <a href="logout.php" class="logout-button">Log Out</a>
        </div>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="writepost.php">Add Post</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="comment.php">Comment</a></li>
            <li><a href="vote.php">Vote</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        </ul>
    </nav>
    
    <main>
        <img src="../Project's Pictures/welcome!.png" alt="main photo">
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
            <div>Company Location: Libya - Tripoli</div>
        </p>
    </footer>
</body>
</html>
