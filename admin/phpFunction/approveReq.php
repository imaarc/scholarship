<?php
include "../../db/connect_db.php";


$id = $_GET['id'];
$file_id = $_GET['file_id'];

$sql = "UPDATE documents set Confirm_status = 1 WHERE Stud_id = '$id' AND Document_id = '$file_id' ";
$query = mysqli_query($connect, $sql);

if ($query) {
	header("Location: ../viewStudentDetails.php?stud_id=$id");

}else{
	echo "error into" .$sql;
}

?>