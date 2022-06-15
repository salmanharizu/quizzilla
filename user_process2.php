<?php
// Connection to DB
include ('db_conn.php');

/* Get data from all fields/textfields
   on registration_form.php */
$email = $_POST['email'];
$name = $_POST['name'];
$pwd =  md5($_POST['password']); // md5 to encrypt pwd
$sch = $_POST['school'];
$cls = $_POST['class'];
$eparents = $_POST['email_parents'];
$table = "student";

// check if the email already exists in the DB
$check = "SELECT email FROM $table
		  WHERE email = '$email'";
$result = mysqli_query($conn, $check) or die(mysql_error());

// if the email already exists, remove the message popup javascript
if (mysqli_num_rows($result) > 0)
{ 
	echo '<script>
		  alert("Your email has been registered! Please use another email.");
		  window.location.href="registration_form2.php";</script>'; 
} else {
	// if the email does not already exist, save the user information in the DB
	$mysql = "INSERT INTO $table
			 (email, password, name, school, class, email_parents)
			 VALUES ('$email', '$pwd', '$name', '$sch', '$cls', '$eparents')";
	
	if (mysqli_query($conn, $mysql)) {
	// show js popup message if new user successfully registers
	echo '<script>
		alert("Successfully Registered New User!");
		window.location.href="index.php";</script>';
		// after successfully registering, return to the login page
	} else {
		echo "Error ; " . mysql_error($conn); }
}

// Close connection
mysqli_close($conn);
?>