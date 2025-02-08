<?php
include "../../db/connect_db.php";


$year = $_POST['year'];
$sem = $_POST['sem'];

$sql = "INSERT INTO semester ( year, sem) VALUES ('$year', '$sem')";
$query = mysqli_query($connect, $sql);

if ($query) {
	header("Location: ../semester.php");

}else{
	echo "error into" .$sql;
}

?>