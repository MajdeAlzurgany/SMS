<?php
    require_once('../sql/UserSql.php'); 
    require_once('user.php');

     try {
        if (!isset($_POST['submit'])) {
            throw new Exception('You should submit the form!');
        }
        if(preg_match('/[!@#$%^&*()_\-<>,.?":{}|<>]/', $_POST['first-name']) || preg_match('/[!@#$%^&*()_\-<>,.?":{}|<>]/', $_POST['last-name'])){
            throw new Exception('Name should not have special characters');
        }
        if (preg_match('/[-#\'"]/', $_POST['username'])) {
            throw new Exception('Username should not contain hyphens, hash symbols, single quotes, or double quotes.');
        }        
        if($_POST['password-signup'] !== $_POST['confirm-password-signup']){
            throw new Exception ('please confirm the password correctly !');

        }
        if(!ctype_digit($_POST['phone-number'])){
            throw new Exception('Wrong number entered !');
        }
        if (!preg_match('/[@%^&()_<>?":{}|<>]/', $_POST['password-signup'])) {
            throw new Exception('Password must contain at least one special character');
        }
        if (preg_match('/[-#\'"]/', $_POST['password-signup'])) {
            throw new Exception('Password should not contain hyphens, hash symbols, single quotes, or double quotes.');
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