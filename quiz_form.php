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
	font-family: "Convergence", sans-serif;
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
.submitbtn{
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
.submitbtn:hover {
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
<form action="quiz_process.php" method="POST"
	<div id="title"><p>Create Question Form</p>
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
	<td id="label">ID Quiz :</td>
	<td><input type="text" name="idQz" placeholder="SET1234" size="7" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td id="label">Quiz Title :</td>
	<td><input type="text" name="titleQ" size="35" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td id="label"><input class="submitbtn" type="submit" name="create" value="Create Question"></td>
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