<?php
session_start();
require("config.php");
require("check_login.php");
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM LAWYER WHERE id = '$id'";
	$value = mysql_query($sql,$conn);
	echo mysql_errno().mysql_error();
}
?>
<html>
<head>
</head>
<body>
	<form method="POST" action="<?php $_PHP_SELF ?>">
	Enter ID of the lawyer to be deleted <input type='text' name='id'><br />
	<input type='submit'>		
	</form>
	<a href="admin.php">Click here to go back</a>
</body>
</html>