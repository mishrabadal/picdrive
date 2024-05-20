<?php
require("database.php");
$fullname = base64_decode($_POST['fullname']);
$username= base64_decode($_POST['username']);
$password = base64_decode($_POST['password']);
$code =[];
$i;
for($i=0;$i<4;$i++)
{
    $code[] = rand(0,9);
}
$activation_code = implode($code);
$store_user = "INSERT INTO users (full_name,username,password,activation_code)
VALUES('$fullname','$username','$password','$activation_code')
";
if($db->query($store_user))
{
    echo "signup success";

}
else{
    echo "signup failed";
}
?>
