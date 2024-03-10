<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSSfiles/SignUpStyle.css">
    <link rel="stylesheet" href="../CSSfiles/matchedStyles.css">
    <title>Sign Up</title>
</head>
<body>
    <header>
        <h1><a href="../HTMLfiles/index.html">JoyJunction</a></h1>
        <img class="logo" src="../Project Pictures/1.png" alt="LOGO">
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="index.html">Home</a></li>
            <li><a target="_blank" href="signIn.php">Sign In</a></li>
            <li><a target="_blank" href="signUp.php">Sign Up</a></li>
            <li><a href="aboutus.html">About Us</a></li>
        </ul>
    </nav>
    <main>
        <div class="sign-up-form">
            <h2>Sign Up</h2>
            <form action="../PHPfilse/sign up files/signup.php" method="post">
                <label for="first-name">First Name:</label>
                <input type="text" id="first-name" name="first-name" >

                <label for="last-name">Last Name:</label>
                <input type="text" id="last-name" name="last-name" >

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" >

                <label for="email-signup">Email:</label>
                <input type="email" id="email-signup" name="email-signup" >

                <label for="password-signup">Password:</label>
                <input type="password" id="password-signup" name="password-signup" >

                <label for="Confirm-password-signup">Confirm Password:</label>
                <input type="password" id="Confirm-password-signup" name="confirm-password-signup" >

                <label for="age">Age:</label>
                <input type="number" id="age" name="age">

                <label for="gender">Gender:
                    <select name="gender" id="gender" >
                        <option value="" disabled selected>Select Gender</option>
                        <option value="male">Male</option>
                        <option value="female">Female</option>
                    </select>
                </label>

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" >


                <label for="phone-number">Phone Number:</label>
                <input type="tel" id="phone-number" name="phone-number"  >

                <label for="user-type">User Type:
                    <select name="user-type" id="user-type" >
                        <option value="" disabled selected>Select User Type</option>
                        <option value="1">Admin</option>
                        <option value="2">User</option>
                        <option value="3">VIP</option>
                    </select>
                </label>
                
                <label for="accept-terms">Accept all Terms<input type="checkbox" id="accept-terms" name="accept-terms" ></label>

                <button type="submit" name="submit">Sign Up</button>
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
