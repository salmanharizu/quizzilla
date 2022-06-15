<?php
// session
include('session.php');

// get Quiz ID
$idquiz = $_GET['idQ'];

// Get data from all textfields on question_form.php
$question = $_POST['question'];
$ans = $_POST['answer'];
$oA = $_POST['optionA'];
$oB = $_POST['optionB'];
$oC = $_POST['optionC'];
$oD = $_POST['optionD'];

// insert data into table
$mysql = "INSERT INTO question
			(question, answer, option_a, option_b, option_c, option_d, id_quiz)
		 VALUES
		 ('$question', '$ans', '$oA', '$oB', '$oC', '$oD', '$idquiz')";

if (mysqli_query($conn, $mysql))
{
	// if the user clicks the ADD QUESTION button
	if (isset($_POST['add']))
	{
		// show js popup message if question entered successfully
		echo '<script>
				alert("Add the next question!");
				window.location.href="question_form.php?idQ='.$idquiz.'";
			  </script>';
	}
	else // if the user clicks the DONE button
	{
		// redirect to quiz collection
		echo '<script>window.location.href="quiz_collection.php";</script>';
	}
}  else {
			echo "Error ; " . mysqli_error($conn);
		}

//Close connection
mysqli_close($conn);
?>