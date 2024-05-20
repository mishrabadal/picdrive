<?php

if($_SERVER['REQUEST_METHOD'] == "POST")
{
	$y = $_POST['one'];
	echo $y;
$uploaded_file = $_FILES['data'];
$location = $uploaded_file['tmp_name'];
$name = $uploaded_file['name'];
$x = move_uploaded_file($location,"wap/".$name);
if($x)
{
    echo "success";
}
else{
    echo "rename file already exists";
}
}

else{
    echo "no";
}





?>