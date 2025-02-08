<?php
include "../../db/connect_db.php";


$Doc_desc = $_POST['Doc_desc'];
$required = $_POST['required'];

$sql = "INSERT INTO documenttype ( Doc_desc, type ) VALUES ('$Doc_desc', '$required')";
$query = mysqli_query($connect, $sql);

if ($query) {
	header("Location: ../requirements.php");

}else{
	echo "error into" .$sql;
}

?>