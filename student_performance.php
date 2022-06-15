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
.button{
    width: 200px;
    height: 30px;
    text-align: center;
	border: none;
	color: white;
	background-color: black;
	box-shadow: inset 0 0 0 0 #FF8C00;
    transition: ease-out 0.3s;
    outline: none;
}
.button:hover {
    box-shadow: inset 300px 0 0 0 white;
    cursor: pointer;
    color: #000;
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
		<option value="name">Student Name</option>
	</select>
  : <input type="text" name="search">
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
			  ORDER BY quiz.title_quiz";
	break;
	default: // if the user selects search by student name
	$query = "SELECT * FROM performance
			  INNER JOIN quiz
				  ON performance.id_quiz = quiz.id_quiz
			  INNER JOIN student
				  ON performance.email_student = student.email
			  WHERE student.name LIKE '%$_POST[search]%'
			  ORDER BY quiz.title_quiz";
	}
} else {
	// default display of performance if user does not search
	$query = "SELECT * FROM performance
			  INNER JOIN quiz
				  ON performance.id_quiz = quiz.id_quiz
			  INNER JOIN student
				  ON performance.email_student = student.email
			  ORDER BY quiz.title_quiz";
}
$mysql = $query;
$result = mysqli_query($conn, $mysql) or die(mysql_error());

$no = 0;

if (mysqli_num_rows($result) > 0)
{
?>

<table cellpadding=10px border=0>
<tr>
	<th style="width: 20px">No</th>
	<th style="width: 200px">Quiz Title</th>
	<th style="width: 400px">Student Name</th>
	<th style="width: 100px">Class</th>
	<th style="width: 200px">School</th>
	<th style="width: 20px">Score</th>
	<th style="width: 200px">Date</th>
	<th style="width: 200px">Email Parents</th>
	<th></th>
</tr>

<?php	
	// display all data from the table in the DB
	while($row = mysqli_fetch_assoc($result))
	{
		$no++;
?>

<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $row['title_quiz']; ?></td>
	<td><?php echo $row['name']; ?></td>
	<td><?php echo $row['class']; ?></td>
	<td><?php echo $row['school']; ?></td>
	<td><?php echo $row['score']; ?></td>
	<td><?php echo $row['date_answer']; ?></td>
	<td><?php echo $row['email_parents']; ?></td>
	
</tr>

<?php
} // close while loop
	echo "</table>";
}
else { echo "<center>No record</center>"; }
?>

<p></p>
<tr>
	<td><input type="button"
			   onclick="window.location.href='notify_email.php';"
			   value="Notify Email"></td>
</tr>
</div>

<?php
include ("footer.php");
?>
</body>
</html>