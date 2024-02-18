<?php
class Search {
    private $category, $date, $username, $postContent;

    public function __construct($category, $date, $username, $postContent) {
        $this->category = $category;
        $this->date = $date;
        $this->username = $username;
        $this->postContent = $postContent;
    }

    public function getCategory() {
        return $this->category;
    }

    public function getDate() {
        return $this->date;
    }

    public function getUsername() {
        return $this->username;
    }

    public function getPostContent() {
        return $this->postContent;
    }

    public function displaySearchResults() {
        echo "Category: " . $this->category . "<br>";
        echo "Date: " . $this->date . "<br>";
        echo "Username: " . $this->username . "<br>";
        echo "Post Content: " . $this->postContent . "<br>";
    }
}
?>
