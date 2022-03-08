<?php
require './auth/db_connection.php';

 // CHECK USER IF LOGGED IN
if(isset($_SESSION['username']) && !empty($_SESSION['username'])){
  $username = $_SESSION['username'];
  $get_user_data = mysqli_query($conn, "SELECT * FROM `users` WHERE username = '$username'");
  $userData =  mysqli_fetch_assoc($get_user_data);

}else{
  header('Location: logout.php');
  exit;
}
?>
