<?php include "includes/header.php" ?>

 <div class="app-wrapper">

 	<div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">

		    	<h1 class="app-page-title mb-3">Courses</h1> 
		 	<div class="d-flex justify-content-between">
		 		<div class="card w-50 me-3" style="height:250px" >
				  <div class="card-body ">
				   <form action="phpFunction/saveCourse.php" method="POST">
				   		<div class="mb-3">
                            <label for="setting-input-1" class="form-label">Degree</label>
                            <input type="text" class="form-control" id="setting-input-1"  required name="degree">
                        </div>
                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Specialty</label>
                            <input type="text" class="form-control" id="setting-input-1"  required name="specialty">
                        </div>
                        <button class="btn btn-primary w-100 text-white" type="submit">Add Course</button>
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
                                <th>Degree</th>
                                <th>Specialty</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                
                                $sql = "SELECT * FROM Course ";
                                $result = $connect->query($sql);

                                if(!empty($result)){
                                	$i = 1;
                                    foreach($result as $row){
                                    	
                                        ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row['degree'] ?> </td>
                                            <td><?php echo $row['specialty'] ?></td>
                                            <td> <a href="#" class="btn btn-danger text-white"> Remove </a> </td>
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