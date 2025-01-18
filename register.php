<?php include "includes/header.php"; ?>


    
    <div class=" d-flex align-items-center justify-content-center m-5" style="height: 100%;">
        <div class="card col-md-8 col-lg-6 col-sm-11 p-4">
            <div class="card-body p-5">
                <div class="app-auth-body mx-auto w-100"> 

                  <h1 class="text-center mb-5" id="titleForm">Personal Information</h1>
                  <div class="progress mb-5">
                    <div class="progress-bar" id="progressBt" role="progressbar" style="width: 50%" aria-valuenow="50" aria-valuemin="0" aria-valuemax="100"></div>
                  </div>

                   <form class="settings-form" action="phpFunctions/saveStudent.php" method="POST">

                    <div class="page1" id="page1">
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">First Name</label>
                            <input type="text" class="form-control" id="setting-input-1"  required name="fName">
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Middle Name</label>
                            <input type="text" class="form-control" id="setting-input-2"required name="mName">
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Last Name</label>
                            <input type="text" class="form-control" id="setting-input-2"  required name="lName">
                        </div>

                        <div class="mb-3">
                          <label for="setting-input-2" class="form-label">Gender</label>
                            <select class="form-select" aria-label="gender" name="gender">
                              <option selected value="female">Male</option>
                              <option value="Male">Female</option>
                            </select>
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Date of Birth</label>
                            <input type="date" class="form-control" id="setting-input-3" name="dob">
                        </div>

                        <div class="form-floating">
                          <textarea class="form-control" placeholder="Full Address" id="floatingTextarea" name="fullAddress"></textarea>
                          <label for="floatingTextarea">Full Address</label>
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Contact Number</label>
                            <input type="number" class="form-control" id="setting-input-3" name="contactNumber">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Previous School</label>
                            <input type="text" class="form-control" id="setting-input-3" name="prevSchool">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Average Grades</label>
                            <input type="number" class="form-control" id="setting-input-3" name="avgGrades">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Email</label>
                            <input type="email" class="form-control" id="setting-input-3" name="email">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Prefered School</label>
                            <input type="text" class="form-control" id="setting-input-3" name="prefSchool">
                        </div>

                         <div class="mb-3">
                          <label for="setting-input-2" class="form-label">Prefered Course</label>
                            <select class="form-select" aria-label="gender" name="prefCourse">
                              <?php
                                  $sql = "SELECT * FROM course";
                                  $query = mysqli_query($connect, $sql);

                                  while($row = $query->fetch_assoc()){
                                  ?>
                                  <option value="<?=$row['courseId']?>"><?=$row['degree']?> <?=$row['specialty']?></option>
                                  <?php
                                  }
                              ?>
                            </select>
                        </div>

                        <div class="d-flex justify-content-end">
                          <button type="button" id="buttonPage1Next" class="btn app-btn-primary mt-5 w-50 center" >Next</button>
                        </div>
                    </div>

                    <div class="page2" id="page2" style="display: none;">
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Father's First Name</label>
                            <input type="text" class="form-control" id="setting-input-1"  required name="FatherFName">
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Father's Middle Name</label>
                            <input type="text" class="form-control" id="setting-input-2"required name="FatherMName">
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Father's Last Name</label>
                            <input type="text" class="form-control" id="setting-input-2"  required name="FatherLName">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Father's Age</label>
                            <input type="number" class="form-control" id="setting-input-3"  name="FatherAge">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Father's Contact Number</label>
                            <input type="number" class="form-control" id="setting-input-3" name="FatherContactNumber">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Father's Occupation</label>
                            <input type="text" class="form-control" id="setting-input-3" name="FatherOccupation">
                        </div>
                      

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Father's Income</label>
                            <input type="number" class="form-control" id="setting-input-3" name="FatherIncome">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Mother's First Name</label>
                            <input type="text" class="form-control" id="setting-input-1"  required name="mothersFName">
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Mother's Middle Name</label>
                            <input type="text" class="form-control" id="setting-input-2"required name="mothersMName">
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-2" class="form-label">Mother's Last Name</label>
                            <input type="text" class="form-control" id="setting-input-2"  required name="mothersLName">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Mother's Age</label>
                            <input type="number" class="form-control" id="setting-input-3" name="mothersAge">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Mother's Contact Number</label>
                            <input type="number" class="form-control" id="setting-input-3" name="mothersContactNumber">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Mother's Occupation</label>
                            <input type="text" class="form-control" id="setting-input-3" name="mothersOccupation">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-3" class="form-label">Mother's Income</label>
                            <input type="number" class="form-control" id="setting-input-3" name="mothersIncome">
                        </div>

                        

                        <div class="d-flex justify-content-end">
                          <button type="button" id="buttonPage2Back" class="btn app-btn-primary mt-5 w-50 center me-3" >Back</button>
                        
                          <button type="submit" class="btn app-btn-primary mt-5 w-50 center" >Save</button>
                        </div>
                    </div>
                    
                  </form>
                    

                </div><!--//auth-body-->
            </div>
        </div>
    </div>

    

    <?php include "includes/footer.php"; ?>



 
   

