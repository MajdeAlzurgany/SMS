
<?php

class Comment {
    private $userid,$postid , $commentText, $date, $time;

    public function __construct($userid,$postid,$date,$time,$commentText) {
        $this->userid = $userid;
        $this->commentText = $commentText;
        $this->date = $date;
        $this->time = $time;
        $this->postid = $postid;
    }

    public function getUserId() {
        return $this->userid;
    }
    public function getPostId(){
        return $this->postid;
    }

    public function getCommentText() {
        return $this->commentText;
    }
    public function getTime(){
        return $this->time ;
    }
    public function getDate(){
        return $this->date ;
    }
    
    public function displayCommentContent() {
        echo "User id: " . $this->userid . "<br>";
        echo "Post id : " . $this->postid . "<br>";
        echo "Comment Text: " . $this->commentText . "<br>";
        echo "Date: " . $this->date . "<br>";
        echo "Time: " . $this->time . "<br>";
    }
    
}

?>
