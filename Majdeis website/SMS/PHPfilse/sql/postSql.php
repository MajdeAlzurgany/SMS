<?php
    require_once('C:\xampp\htdocs\SMS\Majdeis website\SMS\database\database.php');


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
        
            // Generate a comma-separated list of post IDs for the SQL query
            $postIdsString = implode("','", $postIds);
        
            // Construct the SQL query with explicit ordering based on post IDs
            $query = "SELECT post.*, users.user_name, category.category_type  
                      FROM post 
                      JOIN users ON post.user_id = users.user_id 
                      JOIN category ON post.category_id = category.category_id 
                      WHERE post.post_id IN ('$postIdsString')
                      ORDER BY FIELD(post.post_id, '$postIdsString')"; 
        
            $result = $myDB->query_exexute($query);
        
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {  
                    $posts[] = [              
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
        
        public static function fetchTrendedPosts() {
            $trendedPostIds = []; // Array to store post IDs of top 5 trended posts
        
            $myDB = new Database();
            $myDB->establishConnection();
        
            // Calculate vote differences for each post using a subquery and order by the difference in descending order
            $query = "SELECT post_id, (upvotes - downvotes) AS vote_difference
                      FROM (
                          SELECT post.post_id,
                                 COUNT(CASE WHEN userisvote.vote_type_id = 1 THEN 1 END) AS upvotes,
                                 COUNT(CASE WHEN userisvote.vote_type_id = 2 THEN 1 END) AS downvotes
                          FROM post
                          LEFT JOIN userisvote ON post.post_id = userisvote.post_id
                          GROUP BY post.post_id
                      ) AS vote_counts
                      ORDER BY vote_difference DESC
                      LIMIT 5";
        
            $result = $myDB->query_exexute($query);
        
            if ($result && $result->num_rows > 0) {
                while ($row = $result->fetch_assoc()) {
                    $trendedPostIds[] = $row['post_id'];
                }
            }
        
            $myDB->closeConnection();
            return $trendedPostIds;
        }
        
        
        
        
        
        
        
        
         
    
    }


?>