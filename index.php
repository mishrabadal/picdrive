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
    <link rel="stylesheet" href="style/animate.css">
    <link rel="stylesheet" href="style/index.css">
    <script src="js/ajax_random_password.js"></script>
    <script src="js/ajax_activate.js"></script>
    <script src="js/index.js"></script>
    <script src="js/ajax_user_check.js"></script>
    <script src="js/ajax_signup.js"></script>
    <script src="js/ajax_login.js"></script>
    <style>
        .main-font {
            font-family: Righteous;
        }
    </style>
    <title>Document</title>
</head>

<body>
    <div class="container-fluid">
        <div class="row">
           
            <div class="col-md-4 p-4 border border-dark">
                <h3 class="text-center text-danger main-font">PIC DRIVE</h3>
                <P class="text-center">you can store unlimited graphics</P>
                <img src="images/1.jpg" class="img-thumbnail " alt="" style="width: 100%;">
            </div>
            <div class="col-md-4 p-4">
                <h4>SIGN UP</h4>
                <div class="form-group">
                    <form class="signup-form ">
                        <input type="text" required="required" class="form-control mb-3" placeholder="type your name"
                            id="fullname">
                        <div class="email-box"> <input type="email" required="required" class="form-control mb-3"
                                placeholder="Email" id="email">
                            <span> <i class="fa fa-circle-o-notch fa-spin email-loader d-none"></i></span>
                        </div>
                        <div class="position-relative password-box">
                            <input type="password" required="required" class="form-control mb-3" placeholder="password"
                                id="password">

                            <i class="fa fa-eye show-icon"></i>

                        </div>

                        <div style="height: 50px;">


                            <span class="float-left">click generate to improve security</span>
                            <button class="float-right btn btn-warning text-light" id="generate-btn">Generate</button>
                        </div>


                        <div class=" mt-2  mb-3 float-left w-100" style="height: 40px;"><button
                                class="btn d-block mb-5 btn-dark text-light  border submit-btn" type="submit"
                                disabled="disabled">Register now</button>
                          

                        </div>

                        <div class="signup-notice w-100  " style="float:left;height: 30px;">
                        
                        </div>
                    </form>
                    <div class="w-100 d-none activator">
        <span>please check your email to get activation code</span>
                        <input type="text" id="code" name="code" placeholder="Activation code" class="form-control my-2">
                        <button class="btn btn-dark  activation-btn">activate now</button>
                    </div>
                </div>

            </div>

<!-- login coding -->
            <div class="col-md-4 p-4">
                <h4>LOGIN</h4>
               
               <div class="mb-3  "  > 
                   <form class="form-group" id="login-form">
                   <input type=" text" class="form-control mb-3" placeholder="username"  id="login-email">
                   
           <input type=" text" class="form-control mb-3 " placeholder="password"  id="login-password">
                   
     <div align="right">
     <button class="btn btn-success"  id="login-submit-btn">Login</button>
     </div>
               
              
                </form>
                <div id="login-notice" class="pt-2">
                   
                   </div>  
            <div class="login-activator  d-none " >
                <span>please check your mail to get activation code</span>
                <input type="
                " class="form-control" placeholder="enter activation code" name="code" id="login-code">
                <button class="m-2 btn btn-dark text-light login-activate-btn">Activate now</button>
            </div>    
               </div>
              
            </div>
        </div>
    </div>


</body>

</html>