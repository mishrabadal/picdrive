<?php
if($_SERVER['REQUEST_METHOD'] =="POST")
{

  $uploaded_file = $_FILES['data'];
  $location = $uploaded_file['tmp_name'];
  $name = $uploaded_file['name'];
move_uploaded_file($location,"wap/".$name);
echo "file copied ";
  
}
else{
    echo "get";
}
?>