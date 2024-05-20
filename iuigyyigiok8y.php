


$(document).ready(
  function()
  {
    load_image();
   function load_image()
   {
    $.ajax(
      {
        type:"POST",
        url:"load_image.php",
        cache:false,
        success:function(response)
        {
$(".load-image").append(response);
        }
      }
    );
   }
//load image scroll


  }
);












$(window).scroll(
    function()
    {
     var scroll_top = $(window).scrollTop();
     var browser_height = $(window).height();
     var max_height = scroll_top + browser_height;
     var webpage_height = $(document).height();
  
     console.log("scroll top : "+ scroll_top+" browser height : "+ browser_height +" webpage height :  "+ webpage_height +" max height :  "+ max_height);
    // console.log(max_height);
    // if(max_height >= webpage_height-10)
    // {
    //   alert();
    // }
    }
  );