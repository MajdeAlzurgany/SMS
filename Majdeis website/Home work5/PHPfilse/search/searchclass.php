<?php
//to store the search details as an object
class Search {
    private $category, $date , $postContent,  $title , $username;

    public function __construct($username=null , $category, $date, $postContent=null , $title) {
        $this->category = $category;
        $this->date = $date;
        $this->postContent = $postContent;
        $this->title = $title;
        $this->username = $username ;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getDate() {
        return $this->date;
    }
    public function getPostContent() {
        return $this->postContent;
    }
    public function getTitle(){
        return $this->title;
    }
    public function getUsername () {
        return $this->username ; 
    }

    public function displaySearchResults() {
        echo "Category: " . $this->category . "<br>";
        echo "Date: " . $this->date . "<br>";
        echo "Post Content: " . $this->postContent . "<br>";
        echo "Post Content: " . $this->title . "<br>";
    }
}
?>
