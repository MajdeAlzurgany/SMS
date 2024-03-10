<?php
//this class to handle signin and signup querys process 
    session_start();
    require_once('C:\xampp\htdocs\Home work\database\database.php');
    class UserSql{
        public function __construct() {}


        static public function signup($user){
            try {
                $fName = $user->getfName();
                $lName = $user->getlName();
                $email = $user->getEmail();
                $password = $user->getPassword();
                $age = $user->getAge();
                $gender = $user->getGender();
                $location = $user->getLocation();
                $phoneNumber = $user->getPhoneNumber();
                $type = $user->getUserType();
                $userName = $user->getUserName();
            
                $myDB = new database();
                $myDB->establishConnection();

                $myDB->startTransaction();
                
                $query_check = "SELECT * FROM users WHERE user_name = '$userName' OR email = '$email'";
                $result_check = $myDB->query_exexute($query_check);
                if ($result_check && $result_check->num_rows > 0) {
                  throw new Exception("Username or email already exists. Please choose a different one.");
                }    
                $query1 = "INSERT INTO users (user_name, fName, lName, gender, email, userType_id, age, password, location) 
                            VALUES ('$userName', '$fName', '$lName', '$gender', '$email', '$type', '$age', '$password', '$location')";
                $myDB->query_exexute($query1);
            
                   
                $user_id = $myDB->getLastInsertId(); 
            
                
                $query2 = "INSERT INTO phoneNumber (user_id, phone_Number) VALUES ('$user_id', '$phoneNumber')";
                $myDB->query_exexute($query2);
                
                $_SESSION['username'] = $userName;
                $_SESSION['user_id']= $user_id; 

                $myDB->commit();

                header("Location: ../../user interfaces/index.php");
                
                echo "<p>The user and phone number have been inserted into the database.</p>";
            } catch (Exception $e) {
                echo '<p>Message: ' . $e->getMessage() . '</p>';
            } finally {
                $myDB->rollback();
                $myDB->closeConnection();
            }
        }


        static public function login($userDetails){
            try {
                $email = $userDetails->getEmail();
                $password = $userDetails->getPassword();
    
                $myDB = new database();
                $myDB->establishConnection();
    
                // Prepare the SQL query to recive values in parameters 
                $query = "SELECT * FROM users WHERE email = ? AND password = ?";
                $stmt = $myDB->prepare($query);
                $stmt->bind_param("ss", $email, $password); // Bind parameters
                $stmt->execute(); // Execute the prepared statement
                $result = $stmt->get_result(); // Get the result set
            
        
                if ($result && $result->num_rows > 0) {
                 
                    $user = $result->fetch_array(MYSQLI_ASSOC);
    
                    $_SESSION['username'] = $user['user_name'];
                    $_SESSION['user_id'] = $user['user_id'];
    
                    
                    header("Location: ../../user interfaces/index.php");
                    exit();
                } else {
                   
                    throw new Exception("Invalid email or password. Please try again.");
                }
            } catch (Exception $e) {
                echo '<p>Message: ' . $e->getMessage() . '</p>';
            } finally {
                $myDB->closeConnection();
            }
        }

        static public function get_posts(){
            $myDB= new Database();
            $myDB->establishConnection();

            $user_id=$_SESSION['user_id'];
            $query = "SELECT * FROM post WHERE user_id='$user_id'";

            $result = $myDB->query_exexute($query);
            
            

            while($row = $result->fetch_array(MYSQLI_ASSOC)){

                echo "post content : " . $row['post_content'];
            }

        }
            
    }

?>