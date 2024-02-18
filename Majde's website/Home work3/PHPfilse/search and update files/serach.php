<?php
require_once('searchclass.php');
require_once('C:\xampp\htdocs\Home work3\PHPfilse\sql\SearchSql.php');

try {
    if (!isset($_POST['search'])) {
        throw new Exception('You should submit the search form!');
    }
    $toSearch = new Search(
        $_POST['category'],
        $_POST['date'],
        $_POST['post-content'],
        $_POST['post-title']
    );

    //$toSearch->displaySearchResults();

    SearchSql::searchPosts($toSearch); // pass the search to searchsql's method

} catch (Exception $e) {
    echo $e->getMessage();
}
?>