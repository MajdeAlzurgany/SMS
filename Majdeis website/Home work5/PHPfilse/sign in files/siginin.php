<?php
    require_once('../sql/UserSql.php'); 
    require_once('LoginDetails .php'); 
    try {
        if (!isset($_POST['signin'])) {
            throw new Exception("You should submit the form!");
        }
        
        
        if (preg_match('/[-#\'"]/', $_POST['email'])) {
            throw new Exception('email should not contain hyphens, hash symbols, single quotes, or double quotes.');
        }

        if (preg_match('/[#\'"]/', $_POST['password'])) {
            throw new Exception('Password should not contain hyphens, hash symbols, single quotes, or double quotes.');
        }


        //echo "Congratulations! You signed successfully!<br>";

        $userDetails = new LoginDetails ($_POST['email'],$_POST['password']);
        
        //echo "Email: " . $signer->getEmail() . "<br>";
        //echo "Password: " . $signer->getPassword();

        UserSql :: login($userDetails);
    } catch (Exception $e) {
        echo $e->getMessage();
    }


?>