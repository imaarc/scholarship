<?php
require_once('../db/connect_db.php');
date_default_timezone_set("Asia/Manila");
session_start();

// Fetch user input and sanitize
$studentCode = trim($_POST['studentCode']);

$query = "SELECT Stud_code, Stud_id FROM student WHERE Stud_code = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param('s', $studentCode);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Directly compare passwords
    if ($studentCode === $row['Stud_code']) {
        $_SESSION['Stud_id'] = $row['Stud_id'];
        echo "<script>location.href='studentIndex.php?id={$row['Stud_id']}';</script>";
    } else {
        echo '<div class="text-danger text-center mt-1 mb-n2 font-weight-bold">Wrong Username or Password.</div>';
    }
} else {
    echo '<div class="text-danger text-center mt-1 mb-n2 font-weight-bold">Wrong Username or Password.</div>';
}
?>

