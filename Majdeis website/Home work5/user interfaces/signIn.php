<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSSfiles/SignInStyle.css">
    <link rel="stylesheet" href="../CSSfiles/matchedStyles.css">
    <title>Sign In</title>
</head>
<body>
    <header>
        <h1><a href="../HTMLfiles/index.php">JoyJunction</a></h1>
        <img class="logo" src="../Project Pictures/1.png" alt="LOGO">
    </header>

    <nav class="navbar">
        <ul>
            <li><a target="_blank" href="signIn.php">Sign In</a></li>
            <li><a target="_blank" href="signUp.php">Sign Up</a></li>
            <li><a href="aboutus.html">About Us</a></li>
        </ul>
    </nav>
    <main>
        <div class="sign-in-form">
            <h2>Sign In</h2>
            <form action="../PHPfilse/sign in files/siginin.php" method="post">
                
                <label for="sign_in_by" class="sign_in_by">
                    <a href="index.html"><img class="face_signin" src="../Project Pictures/face.webp" alt="facebook"></a>
                    <a href="index.html"><img class="google_signin" src="../Project Pictures/google.jpg" alt="google"></a> <br>
                </label>
                
                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" required >

                <label for="stay-signed-in">Stay Signed In <input type="checkbox" id="stay-signed-in" name="stay-signed-in" required></label> 

                <label class="SignUp" for="SignUp"><a href="signUp.php">I don't have account</a></label>
                <button type="submit"  name="signin">Sign In</button>
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