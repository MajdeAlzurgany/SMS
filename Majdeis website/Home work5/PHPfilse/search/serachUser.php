<?php
require_once('searchclass.php');
require_once('../sql/SearchSql.php');

try {
    if (!isset($_POST['search'])) {
        throw new Exception('You should submit the search form!');
    }
    
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $postContent = isset($_POST['post-content']) ? $_POST['post-content'] : '';
    $postTitle = isset($_POST['post-title']) ? $_POST['post-title'] : '';

    $toSearch = new Search(
        null,
        $category,
        $date,
        $postContent,
        $postTitle
    );

    //$toSearch->displaySearchResults();

    SearchSql::searchPosts($toSearch); 

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
