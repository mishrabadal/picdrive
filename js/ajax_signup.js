$(document).ready(
    function()
    {
        $(".submit-btn").click(
            function(e)
            {
                e.preventDefault();
                $.ajax(
              {
                type : "POST",
                url :"php/sign_up.php",
                data:{
                    fullname : btoa($("#fullname").val()),
                    username : btoa($("#email").val()),
                    password : btoa($("#password").val()),
                },
                beforeSend : function()
                {
                    $(".submit-btn").html("processing please wait");
                    $(".submit-btn").attr("disabled","disabled");
                },
                success : function(response)
                {
                    alert(response);
               if(response.trim() == "signup success")
               {
                $(".signup-form").fadeOut(500,function()
                {
                    $(".activator").removeClass("d-none");
                });
               }
                 else{ alert(response);
                     var message = document.createElement("DIV");
                     message.className = "alert alert-warning";
                     message.innerHTML = "<b>something went wrong please try agin later</b>";
                    $(".signup-notice").append(message);
                    $(".submit-btn").html("Register now");
                    $(".signup-form").trigger("reset");
                    $(".email-loader").addClass("d-none");
                    setTimeout(function(){
                        $(".signup-notice").html("");
                    },2000);
                 }
                }
              }
                );
            }
        );
    }
);