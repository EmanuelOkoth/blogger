<?php

$id = $userData['id'];

// email update
if (isset($_POST["email"])) {
    if(!empty($_POST["email"])){
        $email = mysqli_real_escape_string($conn, htmlspecialchars($_POST["email"]));
        // check if the email format is valid
        if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
            // check if email already exists in the database
            $check_email = mysqli_query($conn, "SELECT `email` FROM `users` WHERE email = '$email'");

            if(mysqli_num_rows($check_email) > 0){    
                $error_message = "This Email Address is already registered. Please Try another.";
            }else{
                // update user email
                $update_email = mysqli_query($conn, "UPDATE `users` SET email = '$email' WHERE id = '$id'");

                if($update_email === TRUE){
                    $success_message = "Your email address has been succesfully Updated.";
                }else{
                    $error_message = "email address update failed, please try again.";
                } 
            }
        }else{
            $error_message = "Please enter a valid Email";
        }
    }else{
        $error_message = "Please fill the email field";
    }
}
// password update
elseif (isset($_POST["password"])) {
    if(!empty(trim($_POST["password"])) && !empty(trim($_POST["password2"]))){
        if (trim($_POST["password"]) === trim($_POST["password2"])) {
            // update user password
            $hashed_password = password_hash($_POST["password"], PASSWORD_DEFAULT);

            $update_password = mysqli_query($conn, "UPDATE `users` SET password = '$hashed_password' WHERE id = '$id'");

            if($update_password === TRUE){
                $success_message = "Your password has been succesfully Updated.";
            }else{
                $error_message = "password update failed, please try again.";
            } 
        }else {
            $error_message = "Passwords do not match";
        }
    }else{
        $error_message = "Please fill the password and confirm password fields";
    }
}
