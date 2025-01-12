<!DOCTYPE html>
<html lang="en"> 
<head>
    <title>NOSP</title>
    <link rel="icon" href="images/balls.png" type="image/x-icon">
    
    <!-- Meta -->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <meta name="description" content="Portal - Bootstrap 5 Admin Dashboard Template For Developers">
    <meta name="author" content="Xiaoying Riley at 3rd Wave Media">    
    <link rel="shortcut icon" href="favicon.ico"> 
    
    <!-- FontAwesome JS-->
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    
    <!-- App CSS -->  
    <link id="theme-style" rel="stylesheet" href="assets/css/portal.css">

</head> 

<body class="app app-login p-0" style="background: url('system_image/background.jpg')!important;background-size: cover !important">     

    
    <div class=" d-flex align-items-center justify-content-center" style="height: 100vh;">
        <div class="card col-md-8 col-lg-3 col-sm-11 p-4">
            <div class="card-body">
                <div class="app-auth-body mx-auto"> 
                    <center>
                        <div class="app-auth-branding mb-0">
                            <a class="" href="#" ><img class="logo-icon  m-4" src="system_image/logo.png" alt="logo" style="width:200px;height:"></a>
                        </div>
                        <h4>E-Governance in Negros Occidental Scholarship Program: (NOSP) Management System
                        </h4>
                    </center>
                    <div class="auth-form-container text-start">
                        <form class="auth-form login-form" id="loginForm" action="phpFunctions/login_functions.php" method="POST">         
                            <div class="email mb-3">
                                <label class="sr-only" for="signin-email">Username</label>
                                <input id="usernameLogin" name="usernameLogin" type="text" class="form-control signin-email" placeholder="Username" required="required">
                            </div><!--//form-group-->
                            <div class="password mb-3">
                                <label class="sr-only" for="signin-password">Password</label>
                                <input id="pwdLogin" name="pwdLogin" type="password" class="form-control signin-password" placeholder="password" required="required">
                                <div class="extra mt-3 row justify-content-between">
                                    <div class="col-6">
                                       
                                    </div><!--//col-6-->
                                </div><!--//extra-->
                            </div><!--//form-group-->

                            <div class="text-center">
                                <button type="submit" class="btn app-btn-secondary w-100 theme-btn mx-auto">Log In</button>

                            </div>
                            <div class="responseLogin">
                                    
                            </div>
                        </form>
                        
                    </div><!--//auth-form-container-->  

                </div><!--//auth-body-->
            </div>
        </div>
    </div>
 
   


    <script defer src="assets/js/jquery.min.js"></script>
    <script defer src="assets/js/jquery-ui.min.js"></script>
    <script defer src="assets/plugins/fontawesome/js/all.min.js"></script>
    <script defer src="assets/js/myJquery.js"></script>

</body>
</html> 

