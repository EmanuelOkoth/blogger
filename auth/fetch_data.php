<?php
 // FETCH ALL USERS
 function fetchPosts($conn){
    $query = mysqli_query($conn, "SELECT * FROM `posts`");
    return mysqli_fetch_all($query, MYSQLI_ASSOC);
 };
 // FETCH SINGLE USER BY ID
 function fetchPost($conn, $column, $value){
    $value = mysqli_real_escape_string($conn, $value);
    $query = mysqli_query($conn, "SELECT * FROM `posts` WHERE `$column`='$value'");
    $data = mysqli_fetch_assoc($query);
    if(!$data){
      header('Location: index.php');
      exit;
    }
   return $data;
 }