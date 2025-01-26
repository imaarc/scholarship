<?php
require_once('../db/connect_db.php');
date_default_timezone_set("Asia/Manila");
session_start();

// Fetch user input and sanitize
$user = trim($_POST['usernameLogin']);
$pass = trim($_POST['pwdLogin']);

if (empty($user) || empty($pass)) {
    echo '<div class="text-danger text-center mt-1 mb-n2 font-weight-bold">Username and Password are required.</div>';
    exit;
}

// Prepare and execute the query securely
$query = "SELECT user_id, username, password, isAdmin FROM user WHERE username = ?";
$stmt = $connect->prepare($query);
$stmt->bind_param('s', $user);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    // Directly compare passwords
    if ($pass === $row['password']) {
        // Set session variables
        $_SESSION['username'] = $row['username'];
        $_SESSION['userId'] = $row['user_id'];

        // Redirect based on user type
        $role = $row['isAdmin'] ? 'admin' : 'user';
        echo "<script>location.href='$role/index.php?role={$row['isAdmin']}';</script>";
      
    } else {
        echo '<div class="text-danger text-center mt-1 mb-n2 font-weight-bold">Wrong Username or Password.</div>';
    }
} else {
    echo '<div class="text-danger text-center mt-1 mb-n2 font-weight-bold">Wrong Username or Password.</div>';
}
?>
