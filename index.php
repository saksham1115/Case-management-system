<?php
session_start();
if(isset($_SESSION['logged_in'])){
	if($_SESSION['logged_in']==1)
		header('Location:admin.php');
	elseif ($_SESSION['logged_in']==2)
		header('Location:main.php');
	else
		header('Location:client.php');
}
?>
<html>
<head>
</head>
<body>
	<form method = "POST" action = "login.php">
	username <input type = "text" name = "username"><br />
	password <input type = "password" name = "password"><br />
	type: <select name="login_type">
	<option value="admin">Admin</option>
	<option value="lawyer">Lawyer</option>
	<option value="client">Client</option>
	</select><br />
	<input type = "submit">
	</form>
</body>
</html>