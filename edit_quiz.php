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
	text-decoration: underline overline;
	text-align: center;
}
table {
	border-collapse: collapse;
	margin: auto;
}
th {
	background-color: moccasin;
}
#label {
	text-align:left;
}
</style>
</head>
<body>

<?php
include ("header.php");
include ("topnav.php");

// get Quiz ID
$idquiz = $_GET['idQ'];

// get quiz data
$sql_quiz = "SELECT * FROM quiz WHERE id_quiz = '$idquiz'";
$result_quiz = mysqli_query($conn, $sql_quiz) or die(mysql_error());
$row_quiz = mysqli_fetch_array($result_quiz);

$title = $row_quiz['title_quiz'];
?>

<div id="mainbody">

<!-- QUIZ TITLE -->
<form action="edit_title.php?idQ=<?php echo $idquiz; ?>" method="POST">
<div id="title"><p>Title : <?php echo $title; ?></p></div>

<table cellpadding=5px style="background-color:lightcyan">
<tr>
	<td style="width: 20px"></td>
	<td style="width: 100px"></td>
	<td style="width: 500px"></td>
	<td style="width: 20px"></td>
</tr>
<tr>
	<td></td>
	<td id="label">ID Quiz :</td>
	<td><?php echo $row_quiz['id_quiz']; ?></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Quiz Title :</td>
	<td><?php echo $row_quiz['title_quiz']; ?></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td id="label"><input type="submit" name="edit_quiz" value="Edit Title">
		</td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
</table>
</form>

<!-- QUIZ QUESTION -->
<form name="question" method="post">
<p><center><h2>Soalan Kuiz</h2></center></p>

<?php
// get quiz question
$sql = "SELECT * FROM question WHERE id_quiz = '$idquiz'";
$result = mysqli_query($conn, $sql) or die(mysql_error());

$no = 0;

if (mysqli_num_rows($result) > 0)
{
?>

<table cellpadding=5px border=1>
<tr>
	<th style="width: 20px">No</th>
	<th style="width: 200px">Question</th>
	<th style="width: 100px">Answer</th>
	<th style="width: 100px">Option A</th>
	<th style="width: 100px">Option B</th>
	<th style="width: 100px">Option C</th>
	<th style="width: 100px">Option D</th>
	<th></th>
</tr>

<?php
while($row = mysqli_fetch_assoc($result))
{
	$id_qs = $row['id_question'];
	$no++;
?>

<tr>
	<td><?php echo $no; ?></td>
	<td><?php echo $row['question']; ?></td>
	<td><?php echo $row['answer']; ?></td>
	<td><?php echo $row['option_a']; ?></td>
	<td><?php echo $row['option_b']; ?></td>
	<td><?php echo $row['option_c']; ?></td>
	<td><?php echo $row['option_d']; ?></td>
	<td><input type="button"
			   onclick="window.location.href='edit_question.php? idQs=<?php echo $id_qs; ?>';"
			   value="Edit Question"></td>
</tr>

<?php
} // close while loop
echo "</table>";
} else { echo "<center>No question</center>"; }
?>

</form>
</div>
<?php
include ("footer.php");
?>
</body>
</html>