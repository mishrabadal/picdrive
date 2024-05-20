$(document).ready(
    function()
    {
        $(".activation-btn").click(
            function()
            {
                var code = btoa($("#code").val());
                var username = btoa($("#email").val());
                $.ajax(
                    {
                        type:"POST",
                        url:"php/activator.php",
                        data:{
                            code :code,
                            username : username
                        },
                        beforeSend : function(){
                           $(".activation-btn").html("please wait we are checking . . . .");
                        },
                        success : function(response)
                        {
                          
                            $(".activation-btn").html(response);
                            if(response.trim() =="user verified")
                            {
                                
                                window.location="profile/profile.php";
                            }
                          
                        }
                    }
                );
            }
        );
    }
);