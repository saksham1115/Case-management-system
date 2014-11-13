<?php
session_start();
require("config.php");
require("check_login.php");
$id = $_SESSION['username'];
$columns = ['name','email_id','lawyer','query'];
$sql = "SELECT * FROM VISITOR WHERE lawyer='$id'";
$value = mysql_query($sql,$conn);
echo mysql_error();
$row = mysql_fetch_assoc($value);
$num = mysql_num_rows($num);
if($num == 0){
	echo "no queries";
}
else{
do{
	echo "<p>";
	for($i = 0 ; $i < $numFields ; $i++){
		echo $columns[$i].': '.$rows[$columns[$i]].'<br>';
	}
	echo "</p>";
}while($rows = mysql_fetch_assoc($value));
}
?>