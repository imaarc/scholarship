<?php
include "../../db/connect_db.php";


$degree = $_POST['degree'];
$specialty = $_POST['specialty'];

$sql = "INSERT INTO course (degree, specialty) VALUES ('$degree','$specialty')";
$query = mysqli_query($connect, $sql);

if ($query) {
	header("Location: ../course.php");

}else{
	echo "error into" .$sql;
}

?>