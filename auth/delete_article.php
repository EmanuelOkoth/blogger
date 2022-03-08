<?php

if (!isset($_GET['id']) || !is_numeric($_GET['id'])) {
    header('Location: index.php');
    exit;
}
$id = $_GET['id'];

$article = fetchPost($conn, 'postId', $id);

if (!$article) {
    header('Location: index.php');
    echo <<<EOD
        <script>
            alert("This article does not exist");
        </script>

    EOD;
}else{
    $deletes_article = mysqli_query($conn, "DELETE FROM `posts` WHERE postId='$id'");
    header('Location: index.php');
    exit;
}