<?php
// session
include('session.php');

// get id_quiz
$idQ =$_GET["idQ"];

// delete quiz from table
// the quiz question will also be deleted
$mysql = "DELETE FROM quiz WHERE id_quiz='$idQ'";

if (mysqli_query($conn, $mysql))
{
// show js popup message if quiz successfully delete
	echo '<script>alert("Quiz successfully deleted!");
			window.location.href="quiz_collection.php";</script>';
}
	else { echo "Error ; " . mysqli_error($conn); }
?>