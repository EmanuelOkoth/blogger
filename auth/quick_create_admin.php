<?php
require 'db_connection.php';

$passw = 'Pace2016';
$username = 'admin';
$email = 'ogwenya@email.com';
$user_hash_password = password_hash($passw, PASSWORD_DEFAULT);

// INSER USER INTO THE DATABASE
$insert_user = mysqli_query($conn, "INSERT INTO `users` (username, email, password) VALUES ('$username', '$email', '$user_hash_password')");

if($insert_user === TRUE){
    echo "Thanks! You have successfully signed up.";
}
else{
    echo "Oops! something wrong.";
}