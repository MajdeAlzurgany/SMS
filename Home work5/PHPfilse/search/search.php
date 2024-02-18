<?php
require_once('searchclass.php');
require_once('../sql/SearchSql.php');

try {
    if (!isset($_POST['search'])) {
        throw new Exception('You should submit the search form!');
    }
    
    $category = isset($_POST['category']) ? $_POST['category'] : '';
    $date = isset($_POST['date']) ? $_POST['date'] : '';
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $postTitle = isset($_POST['post-title']) ? $_POST['post-title'] : '';

    $toSearch = new Search(
        $username,
        $category,
        $date,
        null,
        $postTitle
    );

    //$toSearch->displaySearchResults();

    SearchSql::searchUsersPosts($toSearch); 

} catch (Exception $e) {
    echo $e->getMessage();
}
?>