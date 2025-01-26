<?php
    session_start();

    if(!isset($_SESSION['Stud_id']))
    {	
    	header('location: index.php');
    	exit;
    }else{
    	$Stud_id = $_SESSION['Stud_id'];
    }
    
    	?>