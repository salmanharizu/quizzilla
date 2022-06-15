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
	background-color: #f2fff6;
}
#label {
	text-align: right;
}
</style>
</head>
<body>

<?php
include ("header.php");
include ("topnav.php");

// get Quiz ID
$idquiz = $_GET['idQ'];

// get the title of the quiz
$sql_quiz = "SELECT * FROM quiz WHERE id_quiz = '$idquiz'";
$result_quiz = mysqli_query($conn, $sql_quiz) or die(mysql_error());
$row_quiz = mysqli_fetch_array($result_quiz);

?>

<div id="mainbody">
<html>
<body>
<center>
<p>You Can Play Song While Answer the Quiz</p>
<audio controls loop>
 <source src="Relaxing Sound.mp3" type="audio/mpeg"/>
 Your browser does not support the HTML5 audio tag. Consider updating to a newer browser.
</audio>
</center>
</body>
</html>
</div>

<div id="mainbody">
<form action="check_quiz.php?idQ=<?php echo $idquiz; ?>" method="POST">
<div id="title">
	<p>Title : <?php echo $row_quiz['title_quiz']; ?></p>
</div>

<?php
$no = 0;

// get question from db
$sql = "SELECT * FROM question WHERE id_quiz = '$idquiz'";
$result = mysqli_query($conn, $sql) or die(mysql_error());

while($row = mysqli_fetch_assoc($result))
{
	$no++; // no question
	
	// check if there are only 2 answer choices,
	// no need to display radiobutton for c & d options
	if (empty($row['option_c']))
	{ $optionC = ""; }
	else
	{
		$optionC = '<input type="radio" name="select['.$row['id_question'].']"
							value="'.$row['option_c'].'">';
	}
	
	if (empty($row['option_d']))
	{ $optionD = ""; }
	else
	{
		$optionD = '<input type="radio" name="select['.$row['id_question'].']"
							value="'.$row['option_d'].'">';
	}
?>
<table cellpadding=5px>
<tr>
	<td style="width: 20px"></td>
	<td style="width: 15px"></td>
	<td></td>
	<td style="width: 20px"></td>
</tr>
<tr><!-- show questions -->
	<td></td>
	<td colspan="2" width="900"><?php echo $no.". ".$row["question"]; ?>
		</td>
	<td></td>
</tr>
<tr><!-- display answer options -->
	<td></td>
	<td></td>
	<td><input type="radio" name="select[<?php echo $row ['id_question'];?>]"
			   value="<?php echo $row['option_a']; ?>" required>
		<?php echo $row['option_a']; ?>
		<br>
		<input type="radio" name="select[<?php echo $row ['id_question'];?>]"
			   value="<?php echo $row['option_b']; ?>">
		<?php echo $row['option_b']; ?>
		<br><?php echo $optionC; ?> <?php echo $row['option_c']; ?>
		<br><?php echo $optionD; ?> <?php echo $row['option_d']; ?></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr><?php	}	?>
<tr>
	<td></td>
	<td></td>
	<td align="center"><input type="submit" name="send"
							  value="SEND ANSWER"></td>
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
</div>
<?php
include ("footer.php");
?>
</body>
</html>