<html>
<head>
<style>
#mainbody
{
	background-color: white;
	padding: 20px;
}
#title {
	color: deepskyblue;
	font-size: 50px;
	font-weight: bold;
	font-family: Tw Cen MT Condensed;
	text-align: center;
	text-shadow: 3px 3px 0 navy;
}
</style>
</head>
<body>

<?php
include ("header.php");
include ("topnav.php");
?>

<div id="mainbody">

<?php
// get Quiz ID
$idquiz = $_GET['idQ'];

// get the title of the quiz
$sql_quiz = "SELECT * FROM quiz
			 WHERE id_quiz = '$idquiz'";
$result_quiz = mysqli_query($conn, $sql_quiz) or die(mysql_error());
$row_quiz = mysqli_fetch_array($result_quiz);

// get the student's answer
$ans = $_POST["select"];

// today's date-time
date_default_timezone_set('Asia/Kuala_Lumpur');
$date_time = date('Y-m-d H:i:s');

// start mark
$score = 0;

foreach($ans as $id_question => $student_answer)
{
	// check the answers from the question table
	$sql_ans = "SELECT * FROM question
				 WHERE id_question = '$id_question'";
	$result_ans = mysqli_query($conn, $sql_ans) or die(mysql_error());
	$row_ans = mysqli_fetch_assoc($result_ans);
	
	// compare the student's answer with the correct answer
	if($row_ans["answer"] == $student_answer)
	{
		// if the student's answer is correct, add 1 mark
		$score++;
	}
}

// calculate the number of questions
$query = "SELECT * FROM question WHERE id_quiz = '$idquiz'";
$total_question = mysqli_num_rows(mysqli_query($conn, $query));

// save score in db
$mysql = "INSERT INTO performance
				 (email_student, id_quiz, date_answer, score)
		  VALUES ('$email', '$idquiz', '$date_time', '$score')";
$result = mysqli_query($conn, $mysql) or die(mysql_error());
?>

<div id="title"><p>Result</p></div>
<p><center>Quiz : <?php echo $row_quiz['title_quiz']; ?>
</center></p>
<?php
echo "<center>Mark : ".$score."/".$total_question."</center>";
?>
</div>
<?php
include ("footer.php");
?>
</body>
</html>