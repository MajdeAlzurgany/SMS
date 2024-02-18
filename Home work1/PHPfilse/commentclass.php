
<?php

class Comment {
    private $commenterName, $commentText, $date, $time;

    public function __construct($commenterName, $commentText, $date, $time) {
        $this->commenterName = $commenterName;
        $this->commentText = $commentText;
        $this->date = $date;
        $this->time = $time;
    }

    public function getCommenterName() {
        return $this->commenterName;
    }

    public function getCommentText() {
        return $this->commentText;
    }

    public function displayCommentContent() {
        echo "Commenter Name: " . $this->commenterName . "<br>";
        echo "Comment Text: " . $this->commentText . "<br>";
        echo "Date: " . $this->date . "<br>";
        echo "Time: " . $this->time . "<br>";
    }
    
}

?>
