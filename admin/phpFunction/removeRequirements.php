<?php
include "../../db/connect_db.php";


$id = $_GET['id'];

$sql = "DELETE FROM `documenttype` WHERE doc_id = '$id' ";
$query = mysqli_query($connect, $sql);

if ($query) {
	header("Location: ../requirements.php");

}else{
	echo "error into" .$sql;
}

?>