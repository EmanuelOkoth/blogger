<?php
// require './auth/db_connection.php';
// $targetDir = "uploads/";
// $fileName = basename($_FILES["thumbnail"]["name"]);
// $targetFilePath = $targetDir . $fileName;
// $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
// $allowedThumbnailTypes = array('jpg','png','jpeg', 'svg');
// && !empty(($_FILES["thumbnail"]["name"]))


if(isset($_POST['title']) && isset($_POST['body']) && isset($_POST['tag'])){

    // CHECK IF FIELDS ARE NOT EMPTY
    if(!empty($_POST['title']) && !empty($_POST['body']) && !empty($_POST['tag'])){
        $postAuthor = $userData['id'];
        

        // Escape special characters.
        $postTitle = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
        $postBody = mysqli_real_escape_string($conn, htmlspecialchars($_POST['body']));
        $postTag = mysqli_real_escape_string($conn, htmlspecialchars($_POST['tag']));

        // $postTitle = $_POST['title'];
        // $postBody = $_POST['body'];
        // $postTag = $_POST['tag'];

        // CHECK IF post title already exists
        $check_postTitle = mysqli_query($conn, "SELECT `postTitle` FROM `posts` WHERE postTitle = '$postTitle'");

        if(!mysqli_num_rows($check_postTitle) > 0){
            $create_post = mysqli_query($conn, "INSERT INTO `posts` (postAuthor, postTitle, postBody, postTag) VALUES ('$postAuthor', '$postTitle', '$postBody', '$postTag')");
            if($create_post === TRUE){
                header('Location: index.php');
                $success_message = "Post succesfully created.";
            }
            else{
                $error_message = "Oops! something wrong.";
            }
        }else{
            $error_message = "A Post with this title already exists";
        }
    }else{
        // IF FIELDS ARE EMPTY
        $error_message = "Please fill in all the required fields.";
    }
} 
?>