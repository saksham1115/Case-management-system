<?php
session_start();
require("config.php");
require("check_login.php");
$id = $_SESSION['username'];
$columns = ['name','email_id','lawyer','query'];
$sql = "SELECT * FROM VISITOR WHERE lawyer='$id'";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
do{
	echo "<p>";
	for($i = 0 ; $i < 4 ; $i++){
		echo $columns[$i].': '.$row[$columns[$i]].'<br>';
	}
	echo "</p>";
}while($row = mysql_fetch_assoc($value));
?>
<html>
<head>
<title>Enquiries</title>
</head>
<body>
	<a href="main.php">Go back</a>
</body>
</html>