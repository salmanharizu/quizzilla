<?php
// start session
session_start();

// Connection to DB
include ('db_conn.php');

// Get data from the login form
$cat = $_POST['category'];
$email = $_POST['email'];
$pwd = md5($_POST['password']); //encrypt pwd that the user enters

// when the user clicks the login button,
// get user categories,
// if a teacher, check the login data from the teacher schedule

if ($cat == "T")
{
	$table = "teacher";
}
else {
	$table = "student";
}

// check emails and passwords in the table
$mysql = "SELECT * FROM $table
		  WHERE email = '$email' AND password='$pwd'";
$result = mysqli_query($conn, $mysql);
$row = mysqli_fetch_array($result);

// if there is the same email data and password
if(mysqli_num_rows($result) > 0)
{
	// get the user's name and primary key (email)
	$_SESSION['email'] = $row['email']; // save session data
	$name = $row['name'];
	$_SESSION['category'] = $cat;
	
	// show a message popup if successful
	echo '<script>alert("Welcome '.$name.'");
		  window.location.href="quiz_collection.php";</script>';
}
else // if there is NO the same email and password data
{
	echo '<script>alert("WRONG Email, Password or Category!");
		  window.location.href="index.php";</script>';
		  // back to homepage
}

// Close db connection
mysql_close($conn);
?>