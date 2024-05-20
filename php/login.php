<?php
require("database.php");
$username = base64_decode($_POST['username']);
$password = base64_decode($_POST['password']);
$check_username = "SELECT username FROM users WHERE username = '$username'";
$response = $db->query($check_username);
if($response->num_rows !=0)
{
    $check_password = "SELECT username,password FROM users WHERE username = '$username' AND password = '$password'";
    $password_response = $db->query($check_password);
    if(   $password_response->num_rows !=0)
    {
        // echo "matched";
        $check_status = "SELECT status FROM users WHERE username = '$username' AND password = '$password' AND status = 'active'";
        $status_response = $db->query($check_status);
        if($status_response->num_rows !=0)
        {
            echo "login success";
            session_Start();
$_SESSION['username'] =$username ;
        }
  else{
    echo "login pending";
  }
    }
else{
    echo "wrong password";
}
}
else{
    echo "not user exist";
}
?>