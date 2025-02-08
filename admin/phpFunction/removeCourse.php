<?php
include "../../db/connect_db.php";


$id = $_GET['id'];

$sql = "DELETE FROM `course` WHERE courseId = '$id' ";
$query = mysqli_query($connect, $sql);

if ($query) {
	header("Location: ../course.php");

}else{
	echo "error into" .$sql;
}

?>