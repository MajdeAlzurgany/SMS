<?php
//post class to store it as an object
class Post {
    private $category, $postContent,$date,$time , $title;

    public function __construct($category, $postContent,$date , $time , $title) {
        $this->category = $category;
        $this->postContent = $postContent;
        $this->date=$date;
        $this->time=$time;
        $this->title=$title;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getCategory() {
        return $this->category;
    }

    public function getPostContent() {
        return $this->postContent;
    }

    public function getDate() {
        return $this->date;
    }
    public function getTime() {
        return $this->time;
    }
    public function displayPostContent() {
        echo "Category: " . $this->category . "<br>";
        echo "Post Content: " . $this->postContent . "<br>";
        echo "Date: " . $this->date . "<br>";
        echo "Time: " . $this->time . "<br>";
        echo "Title: " . $this->title . "<br>";
    }
    
}

?>
