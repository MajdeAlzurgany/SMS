<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSSfiles/Style.css">
    <link rel="stylesheet" href="../CSSfiles/matchedStyles.css">
    <title>About Us</title>
</head>
<body>
    <header>
        <h1><a href="index.php">JoyJunction</a></h1>
        <img class="logo" src="../Project's Pictures/1.png" alt="LOGO">

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
            <li><a href="search.php">Search posts</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        </ul>
    </nav>
    
    <main>
        <p>Welcome to JoyJunction, your go-to platform for sharing joy, connecting with like-minded individuals, and expressing yourself creatively! At JoyJunction, we believe in fostering a positive and inclusive community where users can share their thoughts, experiences, and adventures with the world. Whether you're here to explore engaging content, connect with friends, JoyJunction is the place for you. Our dedicated team is committed to providing a user-friendly experience and a safe space for everyone. Join us on this exciting journey as we build a community that celebrates joy, diversity, and creativity! <br> <strong style="text-align: center;">Contact Us!</strong></p>
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
