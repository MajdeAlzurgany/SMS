<?php
require_once('SignInclass.php'); // Include the Signer class file

try {
    if (!isset($_POST['signin'])) {
        throw new Exception("You should submit the form!");
    }

    echo "Congratulations! You signed successfully!<br>";

    $signer = new SignerIn($_POST['email'],$_POST['password']);
    
    echo "Email: " . $signer->getEmail() . "<br>";
    echo "Password: " . $signer->getPassword();
} catch (Exception $e) {
    echo $e->getMessage();
}
?>