<?php

class Post {
    private $userName, $category, $postContent, $postImg,$date,$time;

    public function __construct($userName, $category, $postContent, $postImg ,$date , $time) {
        $this->userName = $userName;
        $this->category = $category;
        $this->postContent = $postContent;
        $this->postImg = $postImg;
        $this->date=$date;
        $this->time=$time;
    }

    public function getUserName() {
        return $this->userName;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getPostContent() {
        return $this->postContent;
    }

    public function getPostImg() {
        return $this->postImg;
    }
    public function displayPostContent() {
        echo "Username: " . $this->userName . "<br>";
        echo "Category: " . $this->category . "<br>";
        echo "Post Content: " . $this->postContent . "<br>";
        echo "Post Image: " . $this->postImg . "<br>";
        echo "Date: " . $this->date . "<br>";
        echo "Time: " . $this->time . "<br>";
    }
    
}

?>
