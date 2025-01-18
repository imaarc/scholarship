<?php
include '../db/connect_db.php';

function generateRandomCode() {
    // Generate 3 random uppercase letters
    $letters = strtoupper(substr(str_shuffle('ABCDEFGHIJKLMNOPQRSTUVWXYZ'), 0, 3));

    // Generate 7 random digits
    $numbers = str_pad(mt_rand(0, 9999999), 7, '0', STR_PAD_LEFT);

    // Concatenate the letters and numbers
    return $letters . $numbers;
}

// Collect data from POST request
$fName = $_POST['fName'];
$mName = $_POST['mName'];
$lName = $_POST['lName'];
$gender = $_POST['gender'];
$dob = $_POST['dob'];
$fullAddress = $_POST['fullAddress'];
$contactNumber = $_POST['contactNumber'];
$prevSchool = $_POST['prevSchool'];
$avgGrades = $_POST['avgGrades'];
$email = $_POST['email'];
$prefSchool = $_POST['prefSchool'];
$prefCourse = $_POST['prefCourse'];

// Page 2 Data - Father's Information
$FatherFName = $_POST['FatherFName'];
$FatherMName = $_POST['FatherMName'];
$FatherLName = $_POST['FatherLName'];
$FatherAge = $_POST['FatherAge'];
$FatherContactNumber = $_POST['FatherContactNumber'];
$FatherOccupation = $_POST['FatherOccupation'];
$FatherIncome = $_POST['FatherIncome'];

// Page 2 Data - Mother's Information
$mothersFName = $_POST['mothersFName'];
$mothersMName = $_POST['mothersMName'];
$mothersLName = $_POST['mothersLName'];
$mothersAge = $_POST['mothersAge'];
$mothersContactNumber = $_POST['mothersContactNumber'];
$mothersOccupation = $_POST['mothersOccupation'];
$mothersIncome = $_POST['mothersIncome'];

$studCode = generateRandomCode();

// Insert into the student table
$studentInsert = "INSERT INTO student(courseId, Stud_code, Stud_fname, Stud_mname, Stud_lname, Stud_gender, Stud_dob, Stud_add, Stud_contact, Stud_email, Stud_highschool, Stud_prefer_school, Stud_grade) 
                  VALUES ('$prefCourse', '$studCode', '$fName', '$mName', '$lName', '$gender', '$dob', '$fullAddress', '$contactNumber', '$email', '$prevSchool', '$prefSchool', '$avgGrades')";

$queryInsert = mysqli_query($connect, $studentInsert);

if ($queryInsert) {
    // Get the last inserted student ID
    $studId = mysqli_insert_id($connect);

    // Insert into the parents table
    $parentsInsert = "INSERT INTO parents(Stud_id, Par_f_fname, Par_f_mname, Par_f_lname, Par_f_age, Par_f_occ, Par_f_contact, Par_f_income, Par_m_fname, Par_m_mname, Par_m_lname, Par_m_age, Par_m_occ, Par_m_contact, Par_m_income) 
                      VALUES ('$studId', '$FatherFName', '$FatherMName', '$FatherLName', '$FatherAge', '$FatherOccupation', '$FatherContactNumber', '$FatherIncome', '$mothersFName', '$mothersMName', '$mothersLName', '$mothersAge', '$mothersOccupation', '$mothersContactNumber', '$mothersIncome')";

    $queryParentsInsert = mysqli_query($connect, $parentsInsert);

    if ($queryParentsInsert) {
        header("Location: ../index.php?success=1");
    } else {
        header("Location: ../index.php?success=0&error=parents");
    }
} else {
    header("Location: ../index.php?success=0&error=student");
}
?>
