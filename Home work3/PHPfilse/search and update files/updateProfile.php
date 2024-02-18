<?php
session_start();
require_once('C:\xampp\htdocs\Home work3\database\database.php');

try {
    if (!isset($_SESSION['username']) || empty($_SESSION['username'])) {
        header("Location: signIn.php");
        exit();
    }

    $db = new Database();
    $connection = $db->establishConnection();

    $userId = $_SESSION['user_id'];

    $query = "SELECT * FROM users WHERE user_id = '$userId'";
    $result = $db->update_record($query);

    if ($result && $result->num_rows > 0) {
        $user = $result->fetch_assoc();
    } else {
        throw new Exception("User data not found!");
    }

    if (isset($_POST['Update'])) {
        $username = $_POST['username'];
        $fname = $_POST['fname'];
        $lname = $_POST['lname'];
        $email = $_POST['email'];
        $gender = $_POST['gender'];
        $age = $_POST['age'];
        $password = $_POST['password'];
        $location = $_POST['location'];

        $check_username_query = "SELECT * FROM users WHERE user_name = '$username' AND user_id != '$userId'";
        $check_username_result = $db->update_record($check_username_query);
        if ($check_username_result && $check_username_result->num_rows > 0) {
            throw new Exception("Username '$username' already exists. Please choose another username.");
        }

        $check_email_query = "SELECT * FROM users WHERE email = '$email' AND user_id != '$userId'";
        $check_email_result = $db->update_record($check_email_query);
        if ($check_email_result && $check_email_result->num_rows > 0) {
            throw new Exception("Email '$email' already exists. Please choose another email.");
        }

        $update_query = "UPDATE users SET user_name='$username', fName='$fname', lName='$lname', email='$email', gender='$gender', age='$age', password='$password', location='$location' WHERE user_id='$userId'";
        $update_result = $db->update_record($update_query);

        if ($update_result) {
            header("Location: ../../user interfaces/signIn.php");
            exit();
        } else {
            throw new Exception("Failed to update profile. Please try again.");
        }
    }
} catch (Exception $e) {
    echo "Error: " . $e->getMessage();
} finally {
    $db->closeConnection();
}
?>
