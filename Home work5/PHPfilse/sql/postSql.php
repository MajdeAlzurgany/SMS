<?php
    require_once('C:\xampp\htdocs\Home work5\database\database.php');

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

        public static function fetchPosts($postIds) {
            $posts = []; // Array to store fetched posts
            
            $myDB = new Database();
            $myDB->establishConnection();
        
            $query = "SELECT post.*, users.user_name, category.category_type  
              FROM post 
              JOIN users ON post.user_id = users.user_id 
              JOIN category ON post.category_id = category.category_id 
              WHERE post.post_id IN ('" . implode("','", $postIds) . "')"; // join clause 
        
            $result = $myDB->query_exexute($query);
        
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {  // 2D array to return it to the show_posts
                    $posts[] = [              //each loop takes this values of the corrent post in the loop 
                        'title' => $row['title'],
                        'username' => $row['user_name'],
                        'categoryType' => $row['category_type'],
                        'date' => $row['date'],
                        'postContent' => $row['post_content'],
                        'userId' => $row['user_id'],
                        'postId' => $row['post_id']
                    ];
                }
            }
        
            $myDB->closeConnection();
            return $posts;
        }
        
    
    }


?>