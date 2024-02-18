<?php
    session_start();
    require_once('C:\xampp\htdocs\Home work5\database\database.php');
    
    if(!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        header("Location: signIn.php");
        exit(); 
    }
    
    $db = new Database();
    
  
    $connection = $db->establishConnection();
    
    $userId = $_SESSION['user_id'];
    
    $query = "SELECT * FROM users WHERE user_id = '$userId'";
    $result = $db->query_exexute($query);
    try{
        if ($result && $result->num_rows > 0) {

            $user = $result->fetch_assoc();
        } else {

            throw new Exception("An error eccour..");
        }
    }catch(Exception $e){
        echo $e->getMessage();
    }finally{
        $db->closeConnection();
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../CSSfiles/editProfile.css">
    <title>Edit Profile</title>
</head>
<body>
    <header>
        <h1><a href="index.php">JoyJunction</a></h1>
        <div class="user-info">
            <?php
                echo '<span>Welcome, ' . $_SESSION['username'] . '</span>';
            ?>
            <a href="logout.php" class="logout-button">Log Out</a>
        </div>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="writepost.php">Add Post</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        </ul>
    </nav>
    
    <main>
        <div class="edit-profile-form">
            <h2>Edit Profile</h2>
            <form class="delete-form" action="../PHPfilse/sql/DeleteAcount.php" method="post">
                <button type="submit" name="deleteAccount" class="delete-account-button">Delete Account</button>
            </form>
            <form action="../PHPfilse/sql/updateProfile.php" method="post">

                <label for="username">Username:</label>
                <input type="text" id="username" name="username" value="<?php echo $user['user_name']; ?>">

                <label for="fname">First Name:</label>
                <input type="text" id="fname" name="fname" value="<?php echo $user['fName']; ?>">

                <label for="lname">Last Name:</label>
                <input type="text" id="lname" name="lname" value="<?php echo $user['lName']; ?>">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>">

                <label for="gender">Gender:</label>
                <input type="text" id="gender" name="gender" value="<?php echo $user['gender']; ?>">

                <label for="age">Age:</label>
                <input type="number" id="age" name="age" value="<?php echo $user['age']; ?>">

                <label for="password">Password:</label>
                <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>">

                <label for="location">Location:</label>
                <input type="text" id="location" name="location" value="<?php echo $user['location']; ?>">

                <input type="submit" name="Update" value="Update">
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
            <div>Company Location: Libya - Tripoli</div>
        </p>
    </footer>
</body>
</html>
