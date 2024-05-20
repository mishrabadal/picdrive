<?php
session_start();
$_SESSION = array();
session_destroy();
header("Location:http://localhost/pic_drive/index.php");
exit;
?>