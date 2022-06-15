<?php
// Connection to DB
include ('db_conn.php');

// get id_quiz
$idQ = $_GET["idQ"];

###### if the user clicks the EDIT TITLE button, ##############
###### update the record in the table   		 ##############
if(isset($_POST['edit']))
{
	$sql = "UPDATE quiz
			SET title_quiz = '".$_POST["titleQ"]."'
			WHERE id_quiz = '$idQ'";
	
	if (mysqli_query($conn, $sql)) {
		echo '<script>alert("Successfully Updated Quiz Title!");
					  window.location.href="edit_quiz.php?idQ='.$idQ.'"
			  </script>';
	} else {
		echo "Error ; " .mysqli_error($conn); }
}
################### UPDATE PROCESS ENDED ###########################

// get the quiz data from the table for display in the textfield
$query = "SELECT  * FROM quiz
		  WHERE id_quiz = '$idQ'";

$result = mysqli_query($conn, $query) or die(mysql_error());
$row_quiz = mysqli_fetch_array($result);
?>

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
	background-color: yellowgreen;
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
?>
<div id="mainbody">
<form action="" method="POST">
<div id="title"><p>Quiz Title Update Form</p></div>
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
	<td></td>
	<td></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Quiz Title :</td>
	<td><input type="text" name="titleQ" size="35"
			   value="<?php echo $row_quiz['title_quiz']; ?>" required>
		</td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td id="label"><input type="button" name="back" value="BACK"
						  onClick="javascript:history.go(-1)">
				   <input type="submit" name="edit" value="SAVE"></td>
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
</div>
<?php
include ("footer.php");
?>
</body>
</html>