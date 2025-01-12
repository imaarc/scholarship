<?php 
	session_start();
	if(isset($_GET['logout'])){
		session_destroy();
		header('location:../admin_index.php');
	}else{
        echo "error";
    }

 ?>