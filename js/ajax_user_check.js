$(document).ready(
    function()
    {
        $("#email").on("change",function()
        {
            if($(this).val() !="")
            {
                $.ajax(
                    {
                        type:"POST",
                        url : "php/check_user.php",
                        data :{
                            username : btoa($(this).val())
                        },
                        beforeSend:function()
                        {
                            $(".email-loader").removeClass("d-none");
                        },
                        success : function(response)
                        {
                            // $(".email-loader").addClass("d-none");
                            // alert(response);
                            if(response.trim()=="user found")
                            {
                                $(".email-loader").removeClass("fa fa-circle-o-notch fa-spin");
                                $(".email-loader").removeClass("fa fa-check-circle text-success");
                                $(".submit-btn").attr("disabled","disabled");
                                $(".email-loader").addClass("fa fa-times-circle text-danger");
                             
                             
                            }
                            else{
                                //user not found
                                $(".email-loader").removeClass("fa fa-circle-o-notch fa-spin");
                                $(".email-loader").removeClass("fa fa-times-circle text-danger");
                                $(".submit-btn").removeAttr("disabled");
                                $(".email-loader").addClass("fa fa-check-circle text-success");
                             
                            }
                        }
                    }
                );
            }
        });
    }
);