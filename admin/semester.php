<?php include "includes/header.php" ?>

 <div class="app-wrapper">

 	<div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">

		    	<h1 class="app-page-title mb-3">Semester</h1> 
		 	<div class="d-flex justify-content-between">
		 		<div class="card w-50 me-3" style="height:250px" >
				  <div class="card-body ">
				   <form action="phpFunction/saveSemester.php" method="POST">
				   		<div class="mb-3">
                            <label for="setting-input-1" class="form-label">Year</label>
                            <select class="form-select" aria-label="Default select example" name="year">
                              <option selected value="1st Year">1st Year</option>
                              <option value="2nd Year">2nd Year</option>
                              <option value="3rd Year">3rd Year</option>
                              <option value="4th Year">4th Year</option>
                              <option value="5th Year">5th Year</option>
                            </select>
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Semester</label>
                            <select class="form-select" aria-label="Default select example" name="sem">
                              <option selected value="1st Semester">1st Semester</option>
                              <option value="2nd Semester">2nd Semester</option>
                              <option value="3rd Semester">3rd Semester</option>
                              <option value="4th Semester">4th Semester</option>
                              <option value="5th Semester">5th Semester</option>
                            </select>
                        </div>
                        <button class="btn btn-primary w-100 text-white" type="submit">Add Requirements</button>
				   </form>
				  </div>
				</div>

				<div class="card w-50" >
				  <div class="card-body">
				    <div class="tab-content" id="orders-table-tab-content">
                    <table id="courses" class="table table-striped table-bordered" style="width:100%">
                        <thead>
                            <tr>
                                <th></th>
                                <th>Year</th>
                                <th>Semester</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                
                                $sql = "SELECT * FROM semester ";
                                $result = $connect->query($sql);

                                if(!empty($result)){
                                	$i = 1;
                                    foreach($result as $row){
                                    	
                                        ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row['year'] ?> </td>
                                            <td><?php echo $row['sem'] ?> </td>
                                            <td> <a href="phpFunction/removeSemester.php?id=<?=$row['sem_id']?>" class="btn btn-danger text-white"> Remove </a> </td>
                                        </tr>
                                        <?php

                                        $i++;
                                    }
                                }
                                
                                ?>
                        </tbody>
                    </table>
                </div>
				  </div>
				</div>
		 	</div>
		 </div>
	</div>
</div>

<?php include "includes/footer.php" ?>