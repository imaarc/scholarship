<?php include "includes/header.php"; ?>
<?php include "db/sessionStudent.php"; ?>

<?php


$select = "SELECT * FROM student WHERE Stud_id = '$Stud_id' ";
$query = mysqli_query($connect, $select)->fetch_assoc();
?>

<div class=" d-flex align-items-center justify-content-center m-5" style="height: 100%;">
	<div class="card col-md-8 col-lg-6 col-sm-11 p-4">
		<div class="card-body p-5">
			<div class="app-auth-body mx-auto w-100"> 

				<h1><?=$query['Stud_code']?></h1>
				<h4><?=$query['Stud_fname']?> <?=$query['Stud_mname']?> <?=$query['Stud_lname']?></h4>
				<h4>Scholarship Status: 

				<?php
					if ($query['Stud_status'] == "Pending") {
						echo "<span class='badge bg-warning'>".$query['Stud_status']."</span>";
					}else if ($query['Stud_status'] == "Rejected") {
						echo "<span class='badge bg-danger'>".$query['Stud_status']."</span>";
					}else if ($query['Stud_status'] == "Approved") {
						echo "<span class='badge bg-success'>".$query['Stud_status']."</span>";
					}

				?>
				 </h4>

				 			<?php 
						    	$sqlSel = "SELECT * FROM documents d JOIN documentType dt on d.Doc_id = dt.doc_id WHERE d.Stud_id =  '$Stud_id'";
						    	$selQuery = mysqli_query($connect, $sqlSel);


						    	if (mysqli_num_rows($selQuery)>0) {
						    		while($row = $selQuery->fetch_assoc()){ ?>

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
									    
								    </div><!--//row-->
							    </div><!--//item-->

						    	<?php	} }else{ ?>

				 <form class="settings-form" action="phpFunctions/saveStudentFiles.php" method="POST" enctype="multipart/form-data">
				    <input type="hidden" name="stud_id" value="<?=$Stud_id?>">
				    <div class="mb-3">
				        <label class="form-label mb-1">Issued Birth Certificate</label>
				        <div class="input-group mb-3">
				            <label class="input-group-text" for="inputGroupFile01">Upload</label>
				            <input type="file" class="form-control" id="inputGroupFile01" name="birth" accept="image/*" required>
				        </div>
				    </div>

				    <div class="mb-3">
				        <label class="form-label mb-1">2x2 Picture</label>
				        <div class="input-group mb-3">
				            <label class="input-group-text" for="inputGroupFile02">Upload</label>
				            <input type="file" class="form-control" id="inputGroupFile02" name="pic" accept="image/*" required>
				        </div>
				    </div>

				    <div class="mb-3">
				        <label class="form-label mb-1">Form 137</label>
				        <div class="input-group mb-3">
				            <label class="input-group-text" for="inputGroupFile03">Upload</label>
				            <input type="file" class="form-control" id="inputGroupFile03" name="form137" accept="image/*" required>
				        </div>
				    </div>

				    <div class="mb-3">
				        <label class="form-label mb-1">Brgy. Indigency</label>
				        <div class="input-group mb-3">
				            <label class="input-group-text" for="inputGroupFile04">Upload</label>
				            <input type="file" class="form-control" id="inputGroupFile04" name="indigency" accept="image/*" required>
				        </div>
				    </div>

				    <div class="mb-3">
				        <label class="form-label mb-1">Scholarship Form</label>
				        <div class="input-group mb-3">
				            <label class="input-group-text" for="inputGroupFile05">Upload</label>
				            <input type="file" class="form-control" id="inputGroupFile05" name="scholarshipForm" accept="image/*" required>
				        </div>
				    </div>

				    <div class="mb-3">
				        <label class="form-label mb-1">Brgy. Endorsement</label>
				        <div class="input-group mb-3">
				            <label class="input-group-text" for="inputGroupFile06">Upload</label>
				            <input type="file" class="form-control" id="inputGroupFile06" name="endorsement" accept="image/*" required>
				        </div>
				    </div>

				    <div class="d-flex justify-content-end">
				        <button type="submit" class="btn app-btn-primary mt-5 w-50 center">Save</button>
				    </div>
				</form>

			<?php } ?>


			</div>
		</div>
	</div>
</div>

<script>
    document.querySelector('.settings-form').addEventListener('submit', function (e) {
        const fileInputs = document.querySelectorAll('input[type="file"]');
        let allFilesFilled = true;

        fileInputs.forEach(input => {
            if (!input.files.length) {
                allFilesFilled = false;
                alert(`Please upload a file for ${input.previousElementSibling.textContent.trim()}`);
                input.focus();
            }
        });

        if (!allFilesFilled) {
            e.preventDefault(); // Prevent form submission if any file is missing
        }
    });
</script>


<?php include "includes/footer.php"; ?>