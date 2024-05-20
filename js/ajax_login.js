$(document).ready(
    function()
    {
       $("#login-submit-btn").click(
        function(e)
        {
e.preventDefault();
var username = btoa($("#login-email").val());
var password = btoa($("#login-password").val());
$.ajax(
    {
        type:"POST",
        url:"php/login.php",
        data : {
            username : username,
            password : password
        },
        beforeSend : function()
        {
            $("#login-submit-btn").html("processing wait ....");
            $("#login-submit-btn").attr("disabled","disabled");
        },
        success: function(response)
        {
        if(response.trim() =="login success")
        {
            window.location = "profile/profile.php";
        }
        else if(response.trim() =="login pending")
        {
           $("#login-form").fadeOut(2000,function()
           {
            $(".login-activator").removeClass("d-none");
            $(".login-activate-btn").click(
                function()
                {
            $.ajax(
                {
                    type : "POST",
                    url:"php/activator.php",
                    data : {
                        code:btoa($("#login-code").val()),
                        username:btoa($("#login-email").val())
                    },
                    beforeSend: function()
                    {
                        $(".login-activate-btn").html("please wait ....");
                        $(".login-activate-btn").attr("disabled","disabled");
                    },
                    success: function(response)
                    {
                    
                        if(response.trim() == "user verified")
                        {
                            window.location ="profile/profile.php";
                          
                        }
                        else{
                            var message = document.createElement("DIV");
                            message.className ="alert alert-danger";
                            message.innerHTML ="<b>"+response+"</b>";
                            $("#login-notice").append(message);
                            $("#login-code").val("");
                        $(".login-activate-btn").removeAttr("disabled");
                        $(".login-activate-btn").html("Activate now");
                        setTimeout(function(){
                            $("#login-notice").html("");
                        },5000);
                            

















                        }
                    }
                }
            );  
                }
            );




           });
        }
        else if(response.trim() =="wrong password")
        {
            var message = document.createElement("DIV");
            message.className ="alert alert-danger";
            message.innerHTML ="<b>wrong password</b>";
            $("#login-notice").append(message);
        $("#login-form").trigger('reset');
        $("#login-submit-btn").removeAttr("disabled");
        $("#login-submit-btn").html("Login");
        setTimeout(function(){
            $("#login-notice").html("");
        },5000);
        }
        else
        {
            var message = document.createElement("DIV");
            message.className ="alert alert-danger";
            message.innerHTML ="<b>user not exist please signup</b>";
            $("#login-notice").append(message);
        $("#login-form").trigger('reset');
        $("#login-submit-btn").removeAttr("disabled");
        $("#login-submit-btn").html("Login");
        setTimeout(function(){
            $("#login-notice").html("");
        },5000);
        }
        }
    }
);
        }
       );
    }
);