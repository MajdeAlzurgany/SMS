<?php
class SignerUp {
    private $fName, $lName, $userName, $Email, $Password, $rePassword, $Age, $Gender, $Location, $PhoneNumber, $UserType;

    function __construct($fName, $lName, $userName, $Email, $Password, $rePassword, $Age, $Gender, $Location, $PhoneNumber, $UserType) {
        $this->fName = $fName;
        $this->lName = $lName;
        $this->userName = $userName;
        $this->Email = $Email;
        $this->Password = $Password;
        $this->rePassword = $rePassword;
        $this->Age = $Age;
        $this->Gender = $Gender;
        $this->Location = $Location;
        $this->PhoneNumber = $PhoneNumber;
        $this->UserType = $UserType;
    }

    public function getfName() {
        return $this->fName;
    }

    public function getlName() {
        return $this->lName;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getEmail() {
        return $this->Email;
    }

    public function getPassword() {
        return $this->Password;
    }

    public function getRePassword() {
        return $this->rePassword;
    }

    public function getAge() {
        return $this->Age;
    }

    public function getGender() {
        return $this->Gender;
    }

    public function getLocation() {
        return $this->Location;
    }

    public function getPhoneNumber() {
        return $this->PhoneNumber;
    }

    public function getUserType() {
        return $this->UserType;
    }
    function setLocation($Location){
        $this->Location = $Location;
    }
    function displayDetails (){
        echo "First Name: " . $this->fName . "<br>";
        echo "Last Name: " . $this->lName . "<br>";
        echo "Username: " . $this->userName . "<br>";
        echo "Email: " . $this->Email . "<br>";
        echo "Password: " . $this->Password . "<br>";
        echo "Confirm Password: " . $this->rePassword . "<br>";
        echo "Age: " . $this-> Age ."<br>";
        echo "Gender: " . $this->Gender . "<br>";
        echo "Location: " . $this->Location. "<br>";
        echo "Phone Number: " . $this->PhoneNumber . "<br>";
        echo "User Type: " . $this->UserType. "<br>";
    }
}
?>
