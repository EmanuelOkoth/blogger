<?php
$statusMsg = '';
function slugify($title){
    $title = trim($title);
    $title = strtolower($title);
    $slug = preg_replace('/&/', '-and-', $title);
    $slug = preg_replace('/[\s\W-]+/', '-', $slug);
    return $slug;
}

if(isset($_POST["submit"])){
    // if thumbnail is also being updated
    if (!empty($_FILES["thumbnail"]["name"])) {
        if(!empty($_POST['title']) && !empty($_POST['body']) && !empty($_POST['tag'])){
            // File upload path
            $targetDir = "uploads/";
            $fileName = basename($_FILES["thumbnail"]["name"]);
            $targetFilePath = $targetDir . $fileName;
            $fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);

            // Escape special characters.
            $postTitle = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
            $postBody = mysqli_real_escape_string($conn, htmlspecialchars($_POST['body']));
            $postTag = mysqli_real_escape_string($conn, htmlspecialchars($_POST['tag']));
            $slug = slugify($postTitle);


            // Allow certain file formats
            $allowTypes = array('jpg','png','jpeg','gif','pdf');
            if(in_array($fileType, $allowTypes)){
                // Upload file to server
                if(move_uploaded_file($_FILES["thumbnail"]["tmp_name"], $targetFilePath)){
                    // Insert image file name into database
                    $insert = mysqli_query($conn, "UPDATE `posts` SET postTitle = '$postTitle', postBody = '$postBody', postTag = '$postTag', postThumbnail = '$fileName', slug = '$slug'  WHERE postId = '$articleId'");
                    if($insert === TRUE){
                        $success_message = "The article was succesfully Updated.";
                        header('Location: index.php');
                    }else{
                        $error_message = "article update failed, please try again.";
                    } 
                }else{
                    $error_message = "Sorry, there was an error uploading your thumbnail. You can use a different filename in case this already exists.";
                }
            }else{
                $error_message = 'Sorry, only JPG, JPEG, PNG & SVG files are allowed for thumbnail.';
            }
        }else{
            $error_message = "Please fill the title, body and tag fields.";
        }
    }else{
        // if thumbnail is not being updated
        if(!empty($_POST['title']) && !empty($_POST['body']) && !empty($_POST['tag'])){
            // Escape special characters.
            $postTitle = mysqli_real_escape_string($conn, htmlspecialchars($_POST['title']));
            $postBody = mysqli_real_escape_string($conn, htmlspecialchars($_POST['body']));
            $postTag = mysqli_real_escape_string($conn, htmlspecialchars($_POST['tag']));
            $slug = slugify($postTitle);

            $insert = mysqli_query($conn, "UPDATE `posts` SET postTitle = '$postTitle', postBody = '$postBody', postTag = '$postTag', slug = '$slug'  WHERE postId = '$articleId'");

            if($insert === TRUE){
                $success_message = "The article was succesfully Updated.";
                header('Location: index.php');
            }else{
                $error_message = "article update failed, please try again.";
            } 
        }else{
            $error_message = "Please fill the title, body and tag fields.";
        }
    }
}

?>