   <?php include "includes/header.php"; ?> 

    
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
 
    <?php include "includes/footer.php"; ?> 