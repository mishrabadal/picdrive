<?php

session_start();
$username = $_SESSION['username'];
echo $_SESSION['username'];
if(empty($_SESSION['username']))
{
  header("Location:http://localhost/pic_drive/index.php");
 
}
?>


<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>profile page</title>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <link rel="stylesheet" href="style/animate.css">
  <script src="js/profile.js"></script>
</head>

<body style="background-color:#FCD0CF ;">
  <nav class="navbar navbar-expand-md bg-dark navbar-dark">
    <a href="#" class="navbar-brand">
      <?php
require("../php/database.php");
$email = $_SESSION['username'];
$get_name = "SELECT full_name FROM users WHERE username='$email'";
$response = $db->query($get_name);
$name = $response->fetch_assoc();
echo $name['full_name'];
      ?>
    </a>
    <ul class="navbar-nav ml-auto">
      <li class="nav-item">
        <a href="php/logout.php" class="nav-link">
          <i class="fa fa-sign-out"></i>Logout
        </a>
      </li>

    </ul>
  </nav>
  <br>
  <div class="container-fluid">
    <div class="row">
      <div class="col-md-3 p-5">
        <div class="w-100 mb-5 bg-light shadow-lg border d-flex flex-column align-items-center justify-content-center"
          style="height: 250px;">
          <i class="fa fa-folder-open upload-icon" style="font-size:100px;"></i>
          <h4 class="upload-header">UPLOAD FILES</h4>
          <span class="free-space">
            <?php
$get_status = "SELECT storage,used_storage FROM users WHERE username ='$username' ";
$response = $db->query($get_status);
$data = $response->fetch_assoc();
$total = $data['storage'];
$used = $data['used_storage'];
$free_space = $total-$used;
echo "FREE SPACE ".$free_space."MB";

?>











          </span>
          <div class="progress w-50 uploaded-progress-con d-none border" style="height: 5px;">
            <div class="progress-bar progress-bar-animated progress-control progress-bar-striped"></div>
          </div>
          <div class="progress-details d-none">
            <span class="progress-percentage"></span>
            <i class="fa fa-pause-circle"></i>
            <i class="fa fa-times-circle"></i>
          </div>
        </div>
        <!-- database coding -->
        <div class="w-100 mb-4 bg-light shadow-lg border d-flex flex-column align-items-center justify-content-center"
          style="height: 250px;">
          <i class="fa fa-database " style="font-size:100px;color:green"></i>
          <h4>MEMORY STATUS</h4>
          <span class="memory-status">
            <?php
$get_status = "SELECT storage,used_storage FROM users WHERE username ='$username' ";
$response = $db->query($get_status);
$data = $response->fetch_assoc();
$total = $data['storage'];
$used = $data['used_storage'];
echo $used."MB/".$total."MB";
$percentage = round($used*100/$total,2);
$color ="";
if($percentage>80)
{
  $color = "bg-danger";
}
else{
  $color = "bg-primary";
}
?>


          </span>


          <div class="progress w-50 border" style="height: 5px;">
            <div class="progress-bar progress-bar-animated progress-bar-striped memory-progress <?php echo $color;?>"
              style="width:<?php echo $percentage."%" ?>"></div>
          </div>

        </div>


        <!-- database coding -->

      </div>
      <!-- midddle column -->
      <div class="col-md-6  p-5 message">d</div>
      <!-- midddle column -->
      <div class="col-md-3  p-5">
        <div class="w-100 mb-4 bg-light shadow-lg border d-flex flex-column align-items-center justify-content-center"
          style="height: 250px;">
          <a href="gallery.php"><i class="fa fa-image " style="font-size:100px; color:red"></i></a>
          <h4>GALLERY</h4>
          <span class="count-photo">
            <?php
$get_id = "SELECT id FROM users WHERE username='$username'";
$response = $db->query($get_id );
$data = $response->fetch_assoc();
$table_name = "user_".$data['id'];
$count_photo = "SELECT COUNT(id) AS total FROM $table_name";
$response = $db->query($count_photo );
$data = $response->fetch_assoc();
echo $data['total']." PHOTOS";
$_SESSION['table_name'] = $table_name ;
?>

          </span>


        </div>

      </div>
    </div>
  </div>
</body>

</html>