<?php
    require_once('../../database/database.php');
    class postSql{
        private $user_id;
        public function __construct($user_id){
            $this->user_id = $user_id;
        }

    
        public function insert_post($post){
            try{
                $title= $post->getTitle();
                $category = $post->getCategory();
                $postContent= $post->getPostContent();
                $date = $post->getDate();
                $time = $post->getTime();

                $myDB = new database();
                $myDB->establishConnection();
            
                $query = "INSERT INTO post (user_id, date, time, category_id, title,post_content) 
                            VALUES ('$this->user_id', '$date', '$time', '$category', '$title', '$postContent')";
                $myDB->query_exexute($query);

                echo "<p>the post has inserted tp the data base by . {$_SESSION['username']} </p>";
            }catch(Exception $e){
                $e->getMessage();
            }finally{
                $myDB->closeConnection();
            }
            

        }
    
    }


?>