<?php
session_start();
require("check_login.php");
require("config.php");
$columns = ['id','name','email_id','license_no','employement','date_of_joining'];
$numFields = count($columns);
$sql = "SELECT * FROM LAWYER";
$value = mysql_query($sql,$conn);
?>
<html>
<head>
</head>
<body>
<?php 
while($rows = mysql_fetch_assoc($value)){
	echo "<p>";
	for($i = 0 ; $i < $numFields ; $i++){
		echo $columns[$i].': '.$rows[$columns[$i]].'<br>';
	}
	echo "</p>";
}
?>
</body>
</html>
