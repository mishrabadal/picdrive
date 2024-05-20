//start rename codng
function image(){
$(document).ready(
    function () {
        $(".edit-icon").each(
            function () {
                $(this).click(
                    function () {
                        var image_path = $(this).attr("data-location");
                        var footer = this.parentElement;
                        var span = footer.getElementsByTagName("SPAN")[0];
                        span.contentEditable = "true";
                        span.focus();
                        var old_name = span.innerHTML;
                        $(this).addClass("d-none");
                        var save_icon = footer.getElementsByClassName("save-icon")[0];
                        var edit_icon = footer.getElementsByClassName("edit-icon")[0];
                        var loader = footer.getElementsByClassName("loader-icon")[0];
                        $(save_icon).removeClass("d-none");
                        $(save_icon).click(
                            function () {
                                var photo_name = span.innerHTML;
                                $.ajax({
                                    type: "POST",
                                    url: "php/rename.php",
                                    data: {
                                        photo_name: photo_name,
                                        photo_path: image_path
                                    },
                                    beforeSend: function () {
                                        $(loader).removeClass("d-none");
                                        $(save_icon).addClass("d-none");
                                    },
                                    success: function (response) {

                                        if (response.trim() == "file already exist change the name") {
                                            alert(response);
                                            $(loader).addClass("d-none");
                                            $(save_icon).removeClass("d-none");
                                            span.focus();
                                        } else if (response.trim() == "success") {

                                            span.innerHTML = photo_name;
                                            span.contentEditable = "false";
                                            $(loader).addClass("d-none");
                                            $(save_icon).addClass("d-none");
                                            $(edit_icon).removeClass("d-none");
                                            var previous_download_link = footer.getElementsByClassName("download-icon")[0].getAttribute("data-location");
                                            var current_download_link = previous_download_link.replace(old_name, photo_name);
                                            footer.getElementsByClassName("download-icon")[0].setAttribute("data-location", current_download_link);
                                            footer.getElementsByClassName("download-icon")[0].setAttribute("photo_name", photo_name);
                                            footer.getElementsByClassName("delete-icon")[0].setAttribute("data-location", current_download_link);
                                            footer.getElementsByClassName("delete-icon")[0].setAttribute("photo_name", photo_name);
                                            footer.getElementsByClassName("edit-icon")[0].setAttribute("data-location", current_download_link);
                                            footer.getElementsByClassName("edit-icon")[0].setAttribute("photo_name", photo_name);
                                            // alert(current_download_link);
                                        }

                                    }
                                });
                            }
                        );
                    }
                );
            }
        );
    }
);
//end rename coding


//start download coding
$(document).ready(
    function () {
        $(".download-icon").each(
            function () {
                $(this).click(
                    function () {
                        var download_link = $(this).attr("data-location");
                        var photo_name = $(this).attr("photo_name");
                        var a = document.createElement("A");
                        a.href = download_link;
                        a.download = photo_name;
                        a.click();
                    }
                );
            }
        );
    }
);

//start download coding
//start delete coding
$(document).ready(
    function () {
        $(".delete-icon").each(
            function () {

                $(this).click(
                    function () {
                        var del_icon = this;
                        $.ajax({
                            type: "POST",
                            url: "php/delete.php",
                            data: {
                                photo_path: $(this).attr("data-location")

                            },
                            beforeSend: function () {

                            },
                            success: function (response) {

                                if (response.trim() == "delete success") {
                                    del_icon.parentElement.parentElement.style.display = "none";
                                }
                            }
                        });
                    }
                );
            }
        );
    }
);
}

//end  delete coding