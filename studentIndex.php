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

				 			

				 <form class="settings-form" action="phpFunctions/saveStudentFiles.php" method="POST" enctype="multipart/form-data">
				    <input type="hidden" name="stud_id" value="<?=$Stud_id?>">

				    <?php
// Fetch all document types
                        $docTypeQuery = "SELECT * FROM documenttype";
                        $docTypeResult = mysqli_query($connect, $docTypeQuery);

                        // Fetch all documents uploaded by the student
                        $uploadedDocsQuery = "SELECT d.Doc_id, d.Confirm_status, dt.Doc_desc 
                                              FROM documents d 
                                              JOIN documenttype dt ON d.Doc_id = dt.doc_id 
                                              WHERE d.Stud_id = '$Stud_id' AND dt.type = 1";
                        $uploadedDocsResult = mysqli_query($connect, $uploadedDocsQuery);

                        // Initialize an array to store uploaded documents
                        $uploadedDocs = [];

                        // Check if there are any uploaded documents
                        if (mysqli_num_rows($uploadedDocsResult) > 0) {
                            while ($row = mysqli_fetch_assoc($uploadedDocsResult)) {
                                $uploadedDocs[$row['Doc_id']] = [
                                    'Doc_desc' => $row['Doc_desc'],
                                    'Confirm_status' => $row['Confirm_status']
                                ];
                            }
                        }

                        // Loop through all document types and check if they exist in the uploaded documents
                        while ($row = mysqli_fetch_assoc($docTypeResult)) {
                            $docId = $row['doc_id'];

                            // Check if the document is already uploaded
                            if (array_key_exists($docId, $uploadedDocs)) {
                                // Display already uploaded document with status
                                ?>
                                <div class="item border-bottom py-3">
                                    <div class="row justify-content-between align-items-center">
                                        <div class="col-auto">
                                            <div class="item-label"><strong><?= $uploadedDocs[$docId]['Doc_desc'] ?></strong></div>
                                            <?php
                                            if ($uploadedDocs[$docId]['Confirm_status']) {
                                                echo '<div class="item-data text-success">Approved</div>';
                                            } else {
                                                echo '<div class="item-data text-warning">Pending</div>';
                                            }
                                            ?>
                                        </div><!--//col-->
                                    </div><!--//row-->
                                </div><!--//item-->
                                <?php
                            } else {
                                // Display upload field for missing documents
                                ?>
                                <div class="mb-3">
                                    <label class="form-label mb-1"><?= $row['Doc_desc'] ?></label>
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="doc<?= $docId ?>">Upload</label>
                                        <input type="file" class="form-control" id="doc<?= $docId ?>" name="doc<?= $docId ?>" accept="image/*" required>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>


				    <div class="d-flex justify-content-end">
				        <button type="submit" class="btn app-btn-primary mt-5 w-50 center">Save</button>
				    </div>
				</form>



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