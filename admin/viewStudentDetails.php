<?php include "includes/header.php";

if (isset($_GET['stud_id'])) {
	$studId = $_GET['stud_id'];
}

$sql = "SELECT * FROM student s 
JOIN parents p on s.stud_id = p.stud_id 
JOIN course c on s.courseId = c.courseId where s.Stud_id = $studId ";

$query = mysqli_query($connect, $sql);


$fetch = $query->fetch_assoc();

 ?>



 <div class="app-wrapper">
	    
	    <div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">

		    	<div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">
			    
			    <h1 class="app-page-title">Student Details</h1>
                <div class="row gy-4">
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							       
							        <div class="col-auto">
								        <h4 class="app-card-title">Personal Information</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">

						    	<div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Student Code</strong></div>
									        <div class="item-data"><?=$fetch['Stud_code']?> </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Name</strong></div>
									        <div class="item-data"><?=$fetch['Stud_fname']?> <?=$fetch['Stud_mname']?> <?=$fetch['Stud_lname']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Email</strong></div>
									        <div class="item-data"><?=$fetch['Stud_email']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Contact Number</strong></div>
									        <div class="item-data">
										        <?=$fetch['Stud_contact']?>
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Address</strong></div>
									        <div class="item-data">
										        <?=$fetch['Stud_add']?>
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->

							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Gender</strong></div>
									        <div class="item-data">
										        <?=$fetch['Stud_gender']?>
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->

							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Birthdate</strong></div>
									        <div class="item-data">
										        <?=$fetch['Stud_dob']?>
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->

							    
						    </div><!--//app-card-body-->
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Parents Information</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">
							    
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Father Fullname </strong></div>
									        <div class="item-data"><?=$fetch['Par_f_fname']?> <?=$fetch['Par_f_mname']?> <?=$fetch['Par_f_lname']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Father Age</strong></div>
									        <div class="item-data"><?=$fetch['Par_f_age']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Father Occupation</strong></div>
									        <div class="item-data"><?=$fetch['Par_f_occ']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Father Contact Number</strong></div>
									        <div class="item-data"><?=$fetch['Par_f_contact']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Father Income</strong></div>
									        <div class="item-data"><?=$fetch['Par_f_income']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->

							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Mother Fullname </strong></div>
									        <div class="item-data"><?=$fetch['Par_m_fname']?> <?=$fetch['Par_m_mname']?> <?=$fetch['Par_m_lname']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Mother Age</strong></div>
									        <div class="item-data"><?=$fetch['Par_m_age']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Mother Occupation</strong></div>
									        <div class="item-data"><?=$fetch['Par_m_occ']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Mother Contact Number</strong></div>
									        <div class="item-data"><?=$fetch['Par_m_contact']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Mother Income</strong></div>
									        <div class="item-data"><?=$fetch['Par_m_income']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
						    </div><!--//app-card-body-->
						   
						</div><!--//app-card-->
	                </div><!--//col-->
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								       
						                
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Status</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">

						    	<div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Previous School</strong></div>
									        <div class="item-data">
										        <?=$fetch['Stud_highschool']?>
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->

							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Prefered School</strong></div>
									        <div class="item-data">
										        <?=$fetch['Stud_prefer_school']?>
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->

							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Prefered Course</strong></div>
									        <div class="item-data">
										        <?=$fetch['degree']?> <?=$fetch['specialty']?>
									        </div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    
							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Year Status</strong></div>
									        <div class="item-data"><?=$fetch['Stud_year_status']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->

							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Average Grade</strong></div>
									        <div class="item-data"><?=$fetch['Stud_grade']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->

							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Student Status</strong></div>
									        <div class="item-data"><?=$fetch['Stud_status']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->

							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Finance Status</strong></div>
									        <div class="item-data"><?=$fetch['Finace_status']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->

							    <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong>Date Qualified</strong></div>
									        <div class="item-data"><?=$fetch['Date_qualified']?></div>
									    </div><!--//col-->
									    
								    </div><!--//row-->
							    </div><!--//item-->
							    
						    </div><!--//app-card-body-->
						   
						</div><!--//app-card-->
	                </div>
	                <div class="col-12 col-lg-6">
		                <div class="app-card app-card-account shadow-sm d-flex flex-column align-items-start">
						    <div class="app-card-header p-3 border-bottom-0">
						        <div class="row align-items-center gx-3">
							        <div class="col-auto">
								        
							        </div><!--//col-->
							        <div class="col-auto">
								        <h4 class="app-card-title">Documents</h4>
							        </div><!--//col-->
						        </div><!--//row-->
						    </div><!--//app-card-header-->
						    <div class="app-card-body px-4 w-100">

						    	<?php 
						    	$sqlSel = "SELECT * FROM documents d JOIN documentType dt on d.Doc_id = dt.doc_id WHERE d.Stud_id =  '$studId'";
						    	$selQuery = mysqli_query($connect, $sqlSel);

						    	while($row = $selQuery->fetch_assoc()){?>

						    	 <div class="item border-bottom py-3">
								    <div class="row justify-content-between align-items-center">
									    <div class="col-auto">
										    <div class="item-label"><strong> <?=$row['Doc_desc']?></strong></div>
										    <?php

										    if ($row['Confirm_status']) {
										    	echo  '<div class="item-data text-success">Approved</div>';
										    }else{
										    	echo  '<div class="item-data text-warning">Pending</div>';
										    }

										    ?>
									    </div><!--//col-->
									    <div class="col text-end">
										    <a class="btn-sm app-btn-secondary" href="../<?=$row['File_name']?>" target="_blank" >View</a>

										    <?php

										    if (!$row['Confirm_status']) {
										    	echo  '<a class="btn-sm app-btn-secondary" href="phpFunction/approveReq.php?id='.$studId.'&&file_id='.$row['Document_id'].'" >Approve</a>';
										    }

										    ?>

									    </div><!--//col-->
								    </div><!--//row-->
							    </div><!--//item-->

						    	<?php } ?>
							    
							    
							   
						    </div><!--//app-card-body-->
						   
						</div><!--//app-card-->
	                </div>
                </div><!--//row-->
			    
		    </div><!--//container-fluid-->
	    </div><!--//app-content-->
	    
	  

<?php include "includes/footer.php" ?>