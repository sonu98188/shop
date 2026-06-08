<?php
session_start();
require("../php/database.php"); 

 $login_user = $_POST['email'];
  $login_password = $_POST['password'];
  $check_email = "SELECT * FROM users WHERE email = '$login_user' AND password = '$login_password'";
    $response = $db->query($check_email);
    if($response->num_rows == 0)
    {
      echo "failed";
    }
    else
    {
      echo "success";
     $_SESSION['user_email'] = $login_user;
    }
?>