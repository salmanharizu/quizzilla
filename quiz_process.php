<?php
// session
include('session.php');

// Get data from all textfields on quiz_form.php
$idquiz = $_POST['idQz'];
$title = $_POST['titleQ'];

// insert quiz data into table
$mysql = "INSERT INTO quiz (id_quiz, title_quiz, email_teacher)
		  VALUES ('$idquiz', '$title', '$email')";

if (mysqli_query($conn, $mysql)) {
// show js popup message if quiz information successfully registered
echo '<script>
		alert("Enter a question!");
		window.location.href="question_form.php?idQ='.$idquiz.'";
	  </script>';
} else {
		echo "Error ; " . mysqli_error($conn); }

//Close connection
mysqli_close($conn);
?>