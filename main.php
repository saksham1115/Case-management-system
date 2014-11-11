<?php 
session_start();
require("config.php");
require("check_login.php");
echo "hello ".$_SESSION['username'];
echo "<br>";
echo "<a href='logout.php'>Logout</a>";
$columns = ['id','name','email_id','license_no','employement','date_of_joining'];
$numFields = count($columns);
$id = $_SESSION['username'];
$sql = "SELECT * FROM LAWYER WHERE id = '$id'";
$value = mysql_query($sql,$conn);
echo mysql_error();
?>
<html>
<body>
<h1>WELCOME LAWYER</h1>
<?php 
$rows = mysql_fetch_assoc($value);
	for($i = 0 ; $i < $numFields ; $i++)
		echo $columns[$i].': '.$rows[$columns[$i]].'<br>';
?>
<a href = 'enquiries.php'>Click here to view you enquiries</a><br />
<a href = 'client_register.php'>Register your client</a><br />
<a href = 'update_password.php'>Change your password</a><br />
<a href = 'update_case.php'>Update Case history</a><br />
</body>
</html>