<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css">
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
    <title>Document</title>
</head>
<body>
    <form   enctype="multipart/form-data" id="form">
<input type="file" name="data" accept="image/*">
<input type="text" name="one">
<input type="submit" id="submit">
    </form>
    <script>
     $(document).ready(
         function()
         {
           $("#form").submit(
               function(e)
               {
                  e.preventDefault();
                 $.ajax({
                    type:"POST",
                    url:"upload.php",
                    data : new FormData(this),
                    contentType:false,
                    processData:false,
                    cache : false,
                    success: function(response)
                    {
                        alert(response);
                    }

                 });
               }
           );
         }
     );
    </script>
</body>
</html>