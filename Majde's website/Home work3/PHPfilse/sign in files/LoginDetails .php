<?php
class LoginDetails  {
    private $email;
    private $password;

    public function __construct($email , $password ) {
        $this->email = $email ; 
        $this->password =$password ; 
    }

    public function getEmail() {
        return $this->email;
    }

    function getPassword() {
        return $this->password;
    }
}
?>