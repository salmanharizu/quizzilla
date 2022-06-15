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
	background-color: mediumturqoise;
}
table, td {
	text-align: right;
}
.submit{
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
.submit:hover {
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

<?php

if(isset($_POST['email'])){
$receiver = $_POST['email'];
$subject = "Here is your children's result";
$body = $_POST['remark'];
$sender = "From:admin@quizzillaquiz.com";

if(mail($receiver, $subject, $body, $sender)){
	echo '<script>
		  alert("Email sent successfully updated!");
		  window.location.href="student_performance.php";</script>';
}else{
	echo '<script>
		  alert("Sorry, failed while sending mail!");
		  window.location.href="student_performance.php";</script>';
}

}else{
    echo "";
}
?>

<div id="mainbody">
<div id="title"><p>Student Remark</p></div>
<meta charset="UTF-8">
<meta name="viewport content="width=device-width, initial-scale=1.0">
<form action="notify_email.php" method="POST">
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
	<td>Email Parents :</td>
	<td><input type="text" name="email" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td>Remark :</td>
	<td><input type="text" name="remark" required></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><input type="submit" name="submit" value="Submit"></td>
	<td></td>
</tr>
<tr>
	<td></td>
	<td></td>
	<td><a href="student_performance.php">Back</a></td>
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