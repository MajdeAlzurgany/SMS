<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSSfiles/WritePostStyle.css">
    <link rel="stylesheet" href="../CSSfiles/matchedStyles.css">
    <title>Write Post</title>
</head>
<body>

    <header>
        <h1><a href="../HTMLfiles/index.html">JoyJunction</a></h1>
        <img class="logo" src="../Project Pictures/1.png" alt="LOGO">

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
            <li><a href="search.php">Search posts</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        </ul>
    </nav>

    <main>
        <div class="write-post-form">
            <h2>Write Post</h2>
            <form action="../PHPfilse/post files/addpost.php" method="POST">
                <input type="hidden" name="username" value="username">
                <label for="user"><img class="username" src="../Project Pictures/blank-profile.webp" alt="username"> <?php echo $_SESSION['username'] ?> </label>

                <label for="singleSelect">Choose a Category:</label>
                <select required class="Category" name="Category">
                    <option disabled selected value="">Select Category</option>
                    <option value="1">Technology</option>
                    <option value="2">Advanture</option>
                    <option value="3">Travel</option>
                    <option value="4">Politician</option>
                    <option value="5">Religious</option>
                    <option value="6">Sports</option>
                </select>
                
                <label for="post-title">Post Title:</label>
                <input type="text" id="post-title" name="post-title" placeholder="Enter the title of your post" required>

                <label for="post-content">Post Content:</label>
                <textarea placeholder="What is on your mind ?" id="post-content" name="post-content" rows="4" required></textarea>

                <button  name="submit" type="submit">Post a Post !</button>
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
            <div> company Locatin : Libya - Tripoli </div>
        </p>
    </footer>

</body>
</html>
