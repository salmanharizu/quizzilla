<?php
// start session
session_start();

// Connection to DB
include ('db_conn.php');

// hold session data based on the primary key in the table
$email = $_SESSION['email'];

// get the category when the user is logged in
$cat = $_SESSION['category'];

// if a teacher, check the login data from the teacher table
if ($cat == "T") {
	$table = "teacher";
} else {
	$table = "student"; }

// get user data based on primary key session
$mysql = mysqli_query($conn, "SELECT * FROM $table WHERE email='$email'");
$row = mysqli_fetch_array($mysql);

$name = $row['name'];
$email = $row['email'];

// if session data is not found in the table
if(!isset($email))
{
header("Location: index.php"); // return to the main page
}

?>