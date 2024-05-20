<?php
session_start();
require("../php/database.php");
$start = $_POST['start'];
$end  = $_POST['end'];

// echo $start;
// echo $end;
$table_name = $_SESSION['table_name'];
$get_image_path ="SELECT * FROM $table_name ORDER BY  id ASC LIMIT $start , $end ";
$response = $db->query($get_image_path );


while($data = $response->fetch_assoc())
{

 $path= str_replace("../","",$data['image_path']);
 $thumb_path= str_replace("../","",$data['thumb_path']);
$image_name = pathinfo($data['image_name']);

$image = "<img src='". $thumb_path."' data-location='".$path."' class='pic' style='width:100px;height:100px;object-fit:cover; border-radius:50%;'>";
$photo_name = $data['image_name'];
echo "<div class='col-md-3 mb-4'>
<div class='card'>
<div class='card-body d-flex justify-content-center align-items-center' width='100'>"
.$image .
"

</div>
<div class='card-footer d-flex justify-content-around align-items-center'>
<span>".$image_name['filename']."</span>
<i class='fa fa-edit edit-icon' data-location='".$path."'></i>
<i class='fa fa-save d-none save-icon' data-location='".$path."'></i>
<i class='fa fa-spinner fa-spin d-none loader-icon' data-location='".$path."'></i>
<i class='fa fa-download download-icon' photo_name='".$photo_name."' data-location='".$path."'></i>
<i class='fa fa-trash delete-icon' data-location='".$path."'></i>
</div>
</div>
</div>";
}
?>