<?php
require("../../php/database.php");
session_start();
$username = $_SESSION['username'];
$get_id = "SELECT id FROM users WHERE username='$username'";
$get_id_response = $db->query($get_id);
$data = $get_id_response->fetch_assoc();
$folder_name = "../gallery/user_".$data['id']."/";
$file = $_FILES['data'];
$user_path = $file['tmp_name'];
$extension= $file['type'];
$file_name = strtolower($file['name']);
$file_size = round(($file['size']/1024)/1024,2);
$table_name = "user_".$data['id'];
$complete_path = $folder_name.$file_name;
$thumb_path = $folder_name."thumb_".$file_name;

//check user space
$chech_space = "SELECT id,storage, used_storage FROM users WHERE username='$username'";
$response = $db->query($chech_space);
$data = $response->fetch_assoc();
$total = $data['storage'];
$used = $data['used_storage'];

$free_space = $total - $used;
if($file_size<$free_space)
{

if(file_exists($folder_name.$file_name))
{
    echo "file already exist please rename your file or upload other file";
}
else{
    if(move_uploaded_file($user_path,$folder_name.$file_name))
    {
    $store_data ="INSERT INTO $table_name(image_name,image_path,thumb_path,image_size)
    VALUES('$file_name','$complete_path','$thumb_path','$file_size')
    ";
    if(($db->query($store_data)))
    {
       $used_memory =  $used + $file_size;
    //    echo $used_memory;
    $update_storage ="UPDATE users SET used_storage ='$used_memory' WHERE username='$username'";
    if($db->query($update_storage))
    {
//thumb picture create coding
if($extension =="image/jpeg"){
   $image_pixels =  imagecreatefromjpeg($folder_name.$file_name);
   $o_width = imagesx($image_pixels);
   $o_height = imagesy($image_pixels);
   $ratio = 100/$o_width;
   $height = $ratio*$o_height;
   $canvas = imagecreatetruecolor(100,$height);
   imagecopyresampled($canvas,$image_pixels,0,0,0,0,100,$height,$o_width,$o_height);
   if(imagejpeg($canvas,$thumb_path))
   {
echo "success";
   }
   imagedestroy($image_pixels);
}
else if($extension =="image/png"){
    $image_pixels =  imagecreatefrompng($folder_name.$file_name);
    $o_width = imagesx($image_pixels);
    $o_height = imagesy($image_pixels);
    $ratio = 100/$o_width;
    $height = $ratio*$o_height;
    $canvas = imagecreatetruecolor(100,$height);
    imagecopyresampled($canvas,$image_pixels,0,0,0,0,100,$height,$o_width,$o_height);
    if(imagepng($canvas,$thumb_path))
    {
 echo "success";
    }
    imagedestroy($image_pixels);
 }

 else if($extension =="image/bmp"){
    $image_pixels =  imagecreatefrombmp($folder_name.$file_name);
    $o_width = imagesx($image_pixels);
    $o_height = imagesy($image_pixels);
    $ratio = 100/$o_width;
    $height = $ratio*$o_height;
    $canvas = imagecreatetruecolor(100,$height);
    imagecopyresampled($canvas,$image_pixels,0,0,0,0,100,$height,$o_width,$o_height);
    if(imagebmp($canvas,$thumb_path))
    {
 echo "success";
    }
    imagedestroy($image_pixels);
 }
 else if($extension =="image/gif"){
    $image_pixels =  imagecreatefromgif($folder_name.$file_name);
    $o_width = imagesx($image_pixels);
    $o_height = imagesy($image_pixels);
    $ratio = 100/$o_width;
    $height = $ratio*$o_height;
    $canvas = imagecreatetruecolor(100,$height);
    imagecopyresampled($canvas,$image_pixels,0,0,0,0,100,$height,$o_width,$o_height);
    if(imagegif($canvas,$thumb_path))
    {
 echo "success";
    }
    imagedestroy($image_pixels);
 }
else{
    echo "change  your file ";
}





    }
    else{
        echo "failed to update used storage";
    }
    }
    else{
        echo "failed to store into database";
    }
    }
}
}
else{
    echo "file size to large kindly purchase some memory space";
}
?>