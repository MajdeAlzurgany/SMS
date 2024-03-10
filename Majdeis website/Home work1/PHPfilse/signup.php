<?php   
    require_once('signUpclass.php');

    try {
        if (!isset($_POST['submit'])) {
            throw new Exception('You should submit the form!');
        }
        if($_POST['password-signup'] !== $_POST['confirm-password-signup']){
            throw new Exception ('please confirm the password correctly !');

        }
        if(!ctype_digit($_POST['phone-number'])){
            throw new Exception('Wrong number entered !');
        }
        if (!preg_match('/[!@#$%^&*()_\-<>,.?":{}|<>]/', $_POST['password-signup'])) {
            throw new Exception('Password must contain at least one special character');
        }
        if(preg_match('/[!@#$%^&*()_\-<>,.?":{}|<>]/', $_POST['first-name']) || preg_match('/[!@#$%^&*()_\-<>,.?":{}|<>]/', $_POST['last-name'])){
            throw new Exception('Name should not have special characters');
        }
        
        $signerUp = new SignerUp(
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

        $signerUp->displayDetails();
    
    } catch (Exception $e) {
        echo $e->getMessage();
    }