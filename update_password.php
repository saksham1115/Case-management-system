<?php
session_start();
require('check_login.php');
require('config.php');
if(isset($_POST['curr_pass'])){
	$password = $_POST['curr_pass'];
	$new_pass = $_POST['new_pass'];
	$re_pass = $_POST['re_pass'];
	if($new_pass != $re_pass){
		unset($_POST['curr_pass']);
		header('Location:update_password.php');
	}
	$id = $_SESSION['username'];
	$sql = "SELECT id,password FROM LAWYER WHERE id = '$id'";
	$value = mysql_query($sql,$conn);
	echo mysql_error();
	$row = mysql_fetch_assoc($value);
	if($row['password'] != $password){
		unset($_POST['curr_pass']);
		header('Location:update_password.php');
	}
	$sql = "UPDATE LAWYER SET password = '$new_pass' WHERE id = '$id'";
	$value = mysql_query($sql,$conn);
	echo mysql_error();
}
?>
<html>
<head>
</head>
<body>
<form method = 'POST' action = '<?php $_PHP_SELF ?>'>
Enter current password:<input name = 'curr_pass' type = 'text'><br />
Enter new password: <input name = 'new_pass' type = 'text'><br />
Re-enter new password: <input name = 're_pass' type = 'text'><br />
<input type = 'submit'>
</form>
</body>
</html>