<?php
session_start();
require('config.php');
require('check_login.php');
?>
<html>
<head>
</head>
<body>
Enter case number:
<form method = 'POST' action = '<?php $_PHP_SELF ?>'>
case id: <select><?php 
$id = $_SESSION['username'];
$sql = "SELECT id FROM CASES WHERE lawyer_id = '$id'";
$value = mysql_query($sql,$conn);
while($row = mysql_fetch_assoc($value)){
	$case_id = $row['id'];
	echo "<option value = '$case_id'>$case_id</option>";
}
?>
</select><br />
<input type = 'submit'>
</form>
</body>
</html>