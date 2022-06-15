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
	border: 2px solid black;
	border-collapse: collapse;
	margin: auto;
	background-color: dodgerblue;
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

// get Question ID
$idquestion = $_GET['idQs'];

###### if the user clicks the EDIT QUESTION button, ##############
###### update the record in the table 		        ##############
if(isset($_POST['edit']))
{
	$sql = "UPDATE question
			SET question = '".$_POST["question"]."',
				answer = '".$_POST["answer"]."',
				option_a = '".$_POST["optionA"]."',
				option_b = '".$_POST["optionB"]."',
				option_c = '".$_POST["optionC"]."',
				option_d = '".$_POST["optionD"]."'
			WHERE id_question = '$idquestion'";
	
	if (mysqli_query($conn, $sql)) {
		echo '<script>alert("Successfully Updated Quiz Questions!");
			   window.location.href="edit_quiz.php?idQ='.$_POST["idquiz"].'";
			   </script>';
	} else {
		echo "Error ; " . mysqli_error($conn); }
}
######################## UPDATE PROCESS ENDED ###########################

// get the question data from the table for display in the textfield
$query = "SELECT * FROM question
		  WHERE id_question = '$idquestion'";

$result = mysqli_query($conn, $query) or die(mysql_error());
$row = mysqli_fetch_array($result);
?>
<div id="mainbody">
<form method="POST">
<div id="title"><p>Question Update Form</p></div>
<table cellpadding=5px>
<tr>
	<td style="width: 20px"></td>
	<td></td>
	<td></td>
	<td style="width: 20px"></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Question :</td>
	<td><textarea name="question" cols="50" rows="3" required><?php echo $row['question']; ?></textarea></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Correct Answer :</td>
	<td><input type="text" name="answer" size="35"
			   value="<?php echo $row['answer']; ?>" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Option A :</td>
	<td><input type="text" name="optionA" size="35"
			   value="<?php echo $row['option_a']; ?>" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Option B :</td>
	<td><input type="text" name="optionB" size="35"
			   value="<?php echo $row['option_b']; ?>" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Option C :</td>
	<td><input type="text" name="optionC" size="35"
			   value="<?php echo $row['option_c']; ?>" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Option D :</td>
	<td><input type="text" name="optionD" size="35"
			   value="<?php echo $row['option_d']; ?>" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td><input type="text" name="idquiz" size="5"
			   value="<?php echo $row['id_quiz']; ?>" hidden></td>
	<td id="label"><input type="button" name="back" value="BACK"
						  onClick="javascript:history.go(-1)">
				   <input type="submit" name="edit" value="SAVE">
		</td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td></td>
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

<?php
include ("footer.php");
?>
</body>