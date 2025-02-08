<?php include "includes/header.php" ?>

 <div class="app-wrapper">

 	<div class="app-content pt-3 p-md-3 p-lg-4">
		    <div class="container-xl">

		    	<h1 class="app-page-title mb-3">Requirements Type</h1> 
		 	<div class="d-flex justify-content-between">
		 		<div class="card w-50 me-3" style="height:250px" >
				  <div class="card-body ">
				   <form action="phpFunction/saveRequirements.php" method="POST">
				   		<div class="mb-3">
                            <label for="setting-input-1" class="form-label">Document Name</label>
                            <input type="text" class="form-control" id="setting-input-1"  required name="Doc_desc">
                        </div>

                        <div class="mb-3">
                            <label for="setting-input-1" class="form-label">Required</label>
                            <select class="form-select" aria-label="Default select example" name="required">
                              <option selected value="1">Once</option>
                              <option value="2">Per Sem</option>
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
                                <th>Document Name</th>
                                <th>Required</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody>
                                <?php 
                                
                                $sql = "SELECT * FROM documenttype ";
                                $result = $connect->query($sql);

                                if(!empty($result)){
                                	$i = 1;
                                    foreach($result as $row){

                                        $type = $row['type'];

                                        if ($type == 1) {
                                            $typeName = "Once";
                                        }else if ($type == 2){
                                            $typeName = "Per Sem";
                                        }
                                        
                                    	
                                        ?>
                                        <tr>
                                            <td><?php echo $i?></td>
                                            <td><?php echo $row['Doc_desc'] ?> </td>
                                            <td><?php echo $typeName ?> </td>
                                            <td> <a href="phpFunction/removeRequirements.php?id=<?=$row['doc_id']?>" class="btn btn-danger text-white"> Remove </a> </td>
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