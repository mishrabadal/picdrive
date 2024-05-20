<?php
session_start();
$username = $_SESSION['username'];
// echo $_SESSION['table_name'];
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
  <script src="load_image.js"></script>
  <style>
    span:focus {
      border: 2px dashed red;
    }
  </style>

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
  <div class="container">
    <div class="row load-image">


    </div>
  </div>


  <!-- modal coding -->
  <div class="modal mt-5" id="view-modal">
    <div class="modal-dialog modal-lg">
      <i class="fa fa-close float-right text-primary" data-dismiss="modal"></i>

      <div class="modal-content">
        <div class="progress w-100" style="height: 10px; border-bottom-left-radius:0;border-bottom-right-radius:0;">
          <div class="progress-bar image-loader"></div>
        </div>
        <div class="modal-body">

        </div>
      </div>
    </div>
  </div>
  <!-- end modal coding -->
  <script>
    function imageshow() {
      $(document).ready(
        function () {
          $(".pic").each(
            function () {

              $(this).click(
                function () {
                  var image = document.createElement("IMG");
                  var url = $(this).attr("data-location");
                  console.log(url);
                  // var url= "badal";
                  // image.style.width="100%";

                  $(".image-loader").css({
                    width: "0%"
                  });
                  $("#view-modal").modal();
                  $.ajax({
                    type: "POST",
                    url: url,
                    xhr: function () {
                      var request = new XMLHttpRequest();
                      request.responseType = "blob";
                      request.onprogress = function (e) {

                        var percentage = (e.loaded * 100) / e.total;
                        $(".image-loader").css({
                          width: percentage + "%"
                        });
                        $(".image-loader").html(percentage + "%");
                      }
                      return request;
                    },
                    beforeSend: function () {
                      $(".modal-body").html("please wait...");
                    },
                    success: function (response) {
                      var image_url = URL.createObjectURL(response);
                      image.src = image_url;
                      image.style.width = "70%";
                      image.style.marginLeft = "15%";
                      image.style.marginRight = "15%";
                      $(".modal-body").html(image);
                    }
                  });
                }
              );
            }
          );
        }
      );
    }
  </script>
  <script src="js/edit_photo.js"></script>


  <script>
    //scroll end coding
    $(document).ready(
      function () {
        var starting_point = 0;
        var ending_point = 12;
        scroll_fetch(starting_point,ending_point);
        function scroll_fetch(starting_point,ending_point) {
          $.ajax({
            type: "POST",
            url: "load_image.php",
            data: {
              start: starting_point,
              end: ending_point
            },
            success: function (response) {
           
              $(".load-image").append(response);
              image();
              imageshow();
            }
          });
        }
       
        $(window).scroll(
          function () {
            var scroll_top = $(window).scrollTop();
            var browser_height = $(window).height();
            var max_height = scroll_top + browser_height;
            var webpage_height = $(document).height();

            console.log("scroll top : " + scroll_top + " browser height : " + browser_height +
              " webpage height :  " + webpage_height + " max height :  " + max_height);

            if (max_height >= webpage_height) {
              starting_point = starting_point + ending_point;
              scroll_fetch(starting_point,ending_point);
            }
          }
        );
      });
  </script>
</body>

</html>