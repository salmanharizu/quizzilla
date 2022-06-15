<html>
<head>
<style>
#mainbody
{
	background-color: white;
	padding: 20px;
}
#title
{
	font-size: 30px;
	font-family: Tw Cen MT Condensed;
	font-weight: bold;
	text-align: center;
}
table {
	margin-left: auto;
	margin-right: auto;
	border-collapse: collapse;
	margin: auto;
	background-color: lightcyan;
}
td {
	text-align: left;
	height: 25px;
}
th {
	height: 30px;
	text-align: left;
	font-weight: bold;
	background-color: deepskyblue;
}
</style>
</head>

<body>
<?php
include ("header.php");
include ("topnav.php");
?>
<div id="mainbody">
	<div id="title"><p>Student Performance</p></div>

<form action="" method="post">
<p><center>
	<select name="category">
		<option>Select Search</option>
		<option value="title">Quiz Title</option>
		<option value="date">Date</option>
	</select>
 :	<input type="text" name="search">
<input type="submit" value="Find" name="find">
</p><center>
</form>

<?php
// if the user clicks the "Find" button && the search box is not empty
if(isset($_POST['find']) && !empty($_POST['search']) )
{
	// identify what dropdown list is selected by the user
	switch ($_POST["category"])
	{
		case "title": // if the user selects search by quiz title
		$query = "SELECT * FROM performance
				  INNER JOIN quiz
					  ON performance.id_quiz = quiz.id_quiz
				  INNER JOIN student
					  ON performance.email_student = student.email
				  WHERE quiz.title_quiz LIKE '%$_POST[search]%'
						AND performance.email_student = '$email'
				  ORDER BY quiz.title_quiz";
		break;
		default: // if the user selects search by date of response
		$query = "SELECT * FROM performance
				  INNER JOIN quiz
					  ON performance.id_quiz = quiz.id_quiz
				  INNER JOIN student
					  ON performance.email_student = student.email
				  WHERE performance.date_answer LIKE '%$_POST[search]%'
						AND performance.email_student = '$email'
				  ORDER BY quiz.title_quiz";
	}
} else {
	// display default performance if user does not search
	$query = "SELECT * FROM performance
				  INNER JOIN quiz
					  ON performance.id_quiz = quiz.id_quiz
				  INNER JOIN student
					  ON performance.email_student = student.email
				  WHERE performance.email_student = '$email'
				  ORDER BY quiz.title_quiz";
}
$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

$no = 0;

if (mysqli_num_rows($result) > 0)
{
	// table for data display
	echo "<table border='0'>";
	echo "<col width='20'>";	// column size 1
	echo "<col width='50'>";	// column size 2
	echo "<col width='300'>";	// column size 3
	echo "<col width='300'>";	// column size 4
	echo "<col width='100'>";	// column size 5
	echo "<col width='200'>";	// column size 6
	echo "<col width='20'>";	// column size 7
	echo "<tr>";
	echo "<th></th>";				// column 1
	echo "<th>No</th>";				// column 2
	echo "<th>Quiz Title</th>";		// column 3
	echo "<th>Student Name</th>";	// column 4
	echo "<th>Score</th>";			// column 5
	echo "<th>Date</th>";			// column 6
	echo "<th></th>";				// column 7
	echo "</tr>";
	
	// display all data from the table in the DB
	while($row = mysqli_fetch_assoc($result))
	{
		$no++;
		echo "<tr height='10'>";
		echo "<td></td>";
		echo "<td>".$no.".</td>";
		echo "<td>".$row['title_quiz']."</td>";
		echo "<td>".$row['name']."</td>";
		echo "<td>".$row['score']."</td>";
		echo "<td>".$row['date_answer']."</td>";
		echo "<td></td>";
		echo "</tr>";
	}
	echo "</table>";
}
else { echo "<center>No record</center>"; }
?>
<p></p></div>
<?php
include ("footer.php");
?>
</body>
</html>