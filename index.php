    <?php include "includes/header.php"; ?> 

      <?php 

    if (isset($_GET['id'])) {
       $id = $_GET['id'];

       $sel = "SELECT * FROM student where Stud_id = '$id' ";
       $selQuery = mysqli_query($connect, $sel)->fetch_assoc();
       ?>
         <div class="modal show" id="successModal" tabindex="-1" aria-labelledby="successModalLabel" aria-hidden="true" style="display: block;">
              <div class="modal-dialog">
                 <div class="modal-content">
                    <div class="modal-header">
                       <h5 class="modal-title" id="successModalLabel">Success Registration</h5>
                       <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                       <p>Your student code is:</p>
                       <h1 class="text-color-success"><?=$selQuery['Stud_code']?></h1>
                       <p>Use your code to login.</p>
                    </div>
                    <div class="modal-footer">
                       <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    </div>
                 </div>
              </div>
           </div>

             <script>
              document.addEventListener('DOMContentLoaded', function () {
                 const successModal = new bootstrap.Modal(document.getElementById('successModal'));
                 successModal.show();
              });
             </script>

       <?php } ?>

    
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
                        <form class="auth-form login-form" id="loginFormStudent" action="phpFunctions/studentLoginFunction.php" method="POST">         
                            <div class="email mb-3">
                                <label class="sr-only" for="signin-email">Student Code</label>
                                <input id="studentCode" name="studentCode" type="text" class="form-control signin-email" placeholder="Student Code" required="required">
                            </div>
                            <div class="mb-3  text-center">
                                <label class="form-check-label " for="remember">Register for a scholarship <a href="register.php">here</a></label>
                            </div>
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