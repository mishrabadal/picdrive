<?php
session_start();
$table_name = $_SESSION['table_name'];
$username = $_SESSION['username'];
require("../../php/database.php");
$path = $_POST['photo_path'];
$complete_path ="../".$path;
if(unlink("../".$path))
{
   //get used storage 
   $get_status = "SELECT used_storage FROM users WHERE username ='$username' ";
   $response = $db->query($get_status);
   $data = $response->fetch_assoc();
  $used = $data['used_storage'];
      //end get used storage 
      //get delete image size
      $get_deleted_image_size = "SELECT image_size FROM $table_name  WHERE image_path ='$complete_path' ";
      $response_delete = $db->query($get_deleted_image_size);
      $response_data =$response_delete->fetch_assoc();
     $image_size =  $response_data['image_size'];
  $storage =$used - $image_size;
  $update_table ="UPDATE users SET used_storage='$storage' WHERE username='$username'";
 if($db->query($update_table))
 {
    $delete_query ="DELETE FROM $table_name WHERE image_path='$complete_path'";
    if($db->query($delete_query))
    {
        echo "delete success";
    }
    else{
        echo "delete failed"; 
    }
 }
 else{
    echo "not delete success";
 }
      //end delete image size

  
}
else{
    echo "delete failed";
}
?>