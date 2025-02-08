<?php
include "../../db/connect_db.php";


$id = $_GET['id'];

$sql = "DELETE FROM `semester` WHERE sem_id = '$id' ";
$query = mysqli_query($connect, $sql);

if ($query) {
	header("Location: ../semester.php");

}else{
	echo "error into" .$sql;
}

?>