<?php
require_once('searchclass.php');

try {
    if (!isset($_GET['search'])) {
        throw new Exception('You should submit the search form!');
    }
    if (empty($category) && empty($date) && empty($username) && empty($postContent)) {
        throw new Exception('Please fill in at least one search criteria!');
    }
    $search = new Search(
        $_GET['category'],
        $_GET['date'],
        $_GET['username'],
        $_GET['post-content']
    );

    $search->displaySearchResults();

} catch (Exception $e) {
    echo $e->getMessage();
}
?>
