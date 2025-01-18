<?php include "includes/header.php" ?>

 <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <div class="row g-3 mb-4 align-items-center justify-content-between">
				    <div class="col-auto">
			            <h1 class="app-page-title mb-0">Students Table</h1> 
				    </div>
			    </div><!--//row-->
			   
                <div class="tab-content" id="orders-table-tab-content">
                    <table id="student" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th>Student Code</th>
                                <th>Fullname</th>
                                <th>Contact Number</th>
                                <th>Email Address</th>
                                <th>Year Status</th>
                                <th>Finance Status</th>
                                <th>Date Qualified</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                
                                $sql = "SELECT * FROM student s INNER JOIN course c ON s.courseId = c.courseId";
                                $result = $connect->query($sql);

                                if(!empty($result)){
                                    foreach($result as $row){
                                        ?>
                                        <tr>
                                            <td><?php echo $row['Stud_code'] ?></td>
                                            <td><?php echo $row['Stud_fname'] ?> <?php echo $row['Stud_mname'] ?> <?php echo $row['Stud_lname'] ?></td>
                                            <td><?php echo $row['Stud_contact'] ?></td>
                                            <td><?php echo $row['Stud_email'] ?></td>
                                            <td><?php echo $row['Stud_year_status'] ?></td>
                                            <td><?php echo $row['Finace_status'] ?></td>
                                            <td><?php echo $row['Date_qualified'] ?></td>
                                            <td> <a href="viewStudentDetails.php" class="btn btn-primary text-white"> View </a> </td>
                                        </tr>
                                        <?php
                                    }
                                }
                                
                                ?>
                        </tbody>
                    </table>
                </div>
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
    </div><!--//app-wrapper-->    
			   

<?php include "includes/footer.php" ?>