$(document).ready(
    function(){
        $(".upload-icon").click(
            function()
            {
               var input = document.createElement("INPUT");
               input.type="file";
               input.accept="image/*";
               input.click();
               input.onchange = function()
               {
                var file = new FormData();
                file.append("data",this.files[0]);
                $.ajax(
                    {
                        type:"POST",
                        url:"php/upload.php",
                        data:file,
                        contentType:false,
                        processData:false,
                        cache:false,
                        xhr : function()
                        {
                            var request = new XMLHttpRequest();
                            request.onprogress = function(e)
                            {
                                console.log(e);
                                var loaded = e.loaded/1024/1024;
                                var total = e.total/1024/1024;
                            var percentage = ((loaded*100)/total).toFixed(2);
                            console.log(e.loaded);
                            console.log(total);
                            console.log(percentage);
                            $(".progress-control").css(
                                {
                                    width:percentage+"%"
                                }
                            );
                            $(".progress-percentage").html("uploaded");
                            }
                            return request;
                        },
                        beforeSend:function(){
                            $(".upload-header").html("please wait.....");
                            $(".upload-icon").css(
                                {
                                    opacity:"0.5",
                                    pointerEvents:"none"
                                }
                            );
                            $(".uploaded-progress-con").removeClass("d-none");
                            $(".progress-details").removeClass("d-none");
                        },
                        success:function(response)
                        {

                            $(".upload-header").html("UPLOAD FILES");
                            $(".upload-icon").css(
                                {
                                    opacity:"1",
                                    pointerEvents:"auto"
                                }
                            );
                            // alert(response);
                            console.log(response);
                         $.ajax({
                            type:"POST",
                            url:"php/count_photo.php",
                            beforeSend:function()
                            {
                                $(".count-photo").html("updating.....");
                            },
                            success: function(response)
                            {
                          
                                $(".count-photo").html(response);
                            }
                         });
// memory status
$.ajax({
    type:"POST",
    url:"php/memory.php",
    beforeSend:function()
    {
        $(".memory-status").html("updating.....");
        $(".free-space").html("updating.....");
    },
    success: function(response)
    {
  
        // $(".memory-status").html(response);
        var json_response = JSON.parse(response);
        var memory_status = json_response[0];
        var free_memory  = json_response[1];
        var percentage  = json_response[2]+"%";
        var color  = json_response[3];
       
              $(".memory-status").html(memory_status);
              $(".free-space").html("FREE SPACE "+free_memory+"MB");
              $(".memory-progress").css("width", percentage);
              $(".memory-progress").addClass(color);
    }
 });


                        }
                    }
                );
               }
            }
        );
    }
);