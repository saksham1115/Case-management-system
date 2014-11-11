<?php
session_start();
require("check_login.php");
?>
<html>
<head>
</head>
<body>
<h1>WELCOME ADMIN</h1><br>
<form method="POST" action="insert.php">
username:<input type = 'text' name = 'id'><br />
name:<input type = 'text' name = 'name'><br />
password:<input type = 'password' name = 'password'><br />
email-id:<input type = 'text' name = 'email_id'><br />
license no:<input type = 'text' name = 'license_no'><br />
type:<select name = 'employment'>
	<option value = 'immigration'>Immigration Lawyer</option>
	<option value = 'family'>Family and Divorce Lawyer</option>
	<option value = 'government'>Government Lawyer</option>
	<option value = 'corporate'>Corporate Lawyer</option>
	<option value = 'paralegal'>Paralegal</option>
	<option value = 'domestic'>Domestic Lawyer</option>
	<option value = 'estate'>Real Estate Law Attorney</option>
	</select><br />
date of joining:<input type = 'date' name = 'doj'><br />
<input type = 'submit'>
</form>
<?php 
session_start();
require("check_login.php");
echo "hello ".$_SESSION['username'];
echo "<br>";
echo "<a href='logout.php'>Logout</a>";
?>
<br />
<a href='admin_view.php'>CLick here to view</a> <br />
<a href='admin_delete.php'>Click here to delete</a><br />
<a href='admin_update.php'>Click here to update</a><br />
</body>
</html>