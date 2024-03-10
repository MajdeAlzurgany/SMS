<?php
    require_once('../sql/UserSql.php'); 
    require_once('user.php');
//here the 2 types of validation are involves , filtering and then  refusing  if there still have sticed chars the sqli , with some other validations such as confirm password most equals passwoed
     try {
        if (!isset($_POST['submit'])) {
            throw new Exception('You should submit the form!');
        }     
        if($_POST['password-signup'] !== $_POST['confirm-password-signup']){
            throw new Exception ('please confirm the password correctly !');

        }
        if (!preg_match('/[@%^&()_<>?":{}|<>]/', $_POST['password-signup'])) {
            throw new Exception('Password must contain at least one special character');
        }
        //filtering data (Type of preventing  SQLI )
        $firstName = filter_var($_POST['first-name'], FILTER_SANITIZE_STRING);
        $lastName = filter_var($_POST['last-name'], FILTER_SANITIZE_STRING);
        $username = filter_var($_POST['username'], FILTER_SANITIZE_STRING);
        $email = filter_var($_POST['email-signup'], FILTER_VALIDATE_EMAIL);
        $password = filter_var($_POST['password-signup'], FILTER_SANITIZE_STRING);
        $confirmPassword = filter_var($_POST['confirm-password-signup'], FILTER_SANITIZE_STRING);
        $age = filter_var($_POST['age'], FILTER_VALIDATE_INT);
        $gender =  filter_var($_POST['gender'], FILTER_SANITIZE_STRING);
        $location = filter_var($_POST['location'], FILTER_SANITIZE_STRING);
        $phoneNumber = filter_var($_POST['phone-number'], FILTER_SANITIZE_STRING);
        $userType =  filter_var($_POST['user-type'], FILTER_SANITIZE_STRING);

        $firstName = htmlspecialchars($firstName);
        $lastName = htmlspecialchars($lastName);
        $username = htmlspecialchars($username);
        
        if(!ctype_digit($_POST['phone-number'])){
            throw new Exception('Wrong number entered !');
        }
        if (preg_match('/[-#\'"]/', $_POST['password-signup'])) {
            throw new Exception('Password should not contain hyphens, hash symbols, single quotes, or double quotes.');
        }
        if(preg_match('/[!@#$%^&*()_\-<>,.?":{}|<>]/', $_POST['first-name']) || preg_match('/[!@#$%^&*()_\-<>,.?":{}|<>]/', $_POST['last-name'])){
            throw new Exception('Name should not have special characters');
        }
        if (preg_match('/[#\';"]/', $_POST['username'])) {
            throw new Exception('Username should not contain hyphens, hash symbols, single quotes, or double quotes.');
        }   
        
        $user = new User(
            $_POST['first-name'],
            $_POST['last-name'],
            $_POST['username'],
            $_POST['email-signup'],
            $_POST['password-signup'],
            $_POST['confirm-password-signup'],
            $_POST['age'],
            $_POST['gender'],
            $_POST['location'],
            $_POST['phone-number'],
            $_POST['user-type']
        );
        
        
        UserSql ::signup($user);
        //$signerUp->displayDetails();
        

    
    } catch (Exception $e) {
        echo $e->getMessage();
    }