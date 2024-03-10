<?php
require_once('C:\xampp\htdocs\Home work3\database\database.php');

if (!isset($_GET['id'])) {
    header("Location: search.php");
    exit();
}

$myDB = new Database();
$connection = $myDB->establishConnection();

$postId = $_GET['id'];

$query = "SELECT * FROM post WHERE post_id = '$postId'";
$result = $myDB->query_exexute($query);

if ($result && $result->num_rows > 0) {
    $post = $result->fetch_array(MYSQLI_ASSOC);
} else {
    echo "Post data not found!";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="../CSSfiles/editpost.css">
    <title>Edit Post</title>
</head>
<body>
    <header>
        <h1><a href="index.php">JoyJunction</a></h1>
    </header>

    <nav class="navbar">
        <ul>
            <li><a href="index.php">Home</a></li>
            <li><a href="writepost.php">Add Post</a></li>
            <li><a href="search.php">Search</a></li>
            <li><a href="aboutus.php">About Us</a></li>
        </ul>
    </nav>
    
    <main>
        <div class="edit-post-form">
            <h2>Edit Post</h2>
            <form action="../PHPfilse/search and update files/update_post.php" method="post">

                <input type="hidden" name="postId" value="<?php echo $postId; ?>">

                <label for="title">Title:</label>
                <input type="text" id="title" name="title" value="<?php echo $post['title']; ?>">

                <label for="category">Category:</label>
                <select id="category" name="category">
                    <option disabled selected value="">Select Category</option>
                    <option value="1" <?php if ($post['category_id'] == 1) echo 'selected'; ?>>Technology</option>
                    <option value="2" <?php if ($post['category_id'] == 2) echo 'selected'; ?>>Adventure</option>
                    <option value="3" <?php if ($post['category_id'] == 3) echo 'selected'; ?>>Travel</option>
                    <option value="4" <?php if ($post['category_id'] == 4) echo 'selected'; ?>>Politician</option>
                    <option value="5" <?php if ($post['category_id'] == 5) echo 'selected'; ?>>Religious</option>
                    <option value="6" <?php if ($post['category_id'] == 6) echo 'selected'; ?>>Sports</option>
                </select>


                <label for="date">Date:</label>
                <input type="date" id="date" name="date" value="<?php echo $post['date']; ?>">

                <label for="post-content">Post Content:</label>
                <textarea id="post-content" name="post-content"><?php echo $post['post_content']; ?></textarea>

                <input type="submit" name="updatePost" value="Update">
            </form>
        </div>
    </main>
</body>
</html>
