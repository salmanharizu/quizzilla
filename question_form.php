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
	background-color: #FF8C00;
}
#label {
	text-align: right;
}

.btn{
    width: 200px;
    height: 30px;
    text-align: center;
	border: none;
	color: white;
	background-color: black;
	box-shadow: inset 0 0 0 0 #FF8C00;
    transition: ease-in 0.3s;
    outline: none;
}
.btn:hover {
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

// get a Quiz ID
$idquiz = $_GET['idQ'];
?>
<div id="mainbody">
<form action="question_process.php?idQ=<?php echo $idquiz; ?>" method="POST">
	<div id="title"><p>Create Question Form 1</p></div>
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
	<td><textarea name="question" cols="50" rows="3"
				  placeholder="Type a question here" required>
	   </textarea></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Right Answer :</td>
	<td><input type="text" name="answer" size="35" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Option A :</td>
	<td><input type="text" name="optionA" size="35" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Option B :</td>
	<td><input type="text" name="optionB" size="35" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Option C :</td>
	<td><input type="text" name="optionC" size="35" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Option D :</td>
	<td><input type="text" name="optionD" size="35" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td id="label">
		  <input type="submit" class="btn" name="add" value="Add Question">
		  <input type="submit" class="btn" name="done" value="Done"></td>
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


<div id="title"><p>Upload Question</p></div>
<!-- form for uploading questions -->
<form name="upload" action="upload_question.php?idQ=<?php echo $idquiz; ?>" method="POST" enctype="multipart/form-data">
    <table cellpadding=5px>
            <td id="label"></td>
            <td><center>Select file to upload (excel .csv files only) :
                <input type="file" name="csv_file" required>
                <p><input type="submit" class="btn" name="upload" value="Upload"></p>
                </center>
                </form> 
			</td>
        </tr>
</table>

</div>
<?php
include ("footer.php");
?>
</body>
</html>