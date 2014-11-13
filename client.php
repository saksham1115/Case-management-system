<?php
session_start();
require("config.php");
require("check_login.php");
$id = $_SESSION['username'];
$sql = "SELECT id,lawyer_id,case_id,name,email_id,contact_no FROM CLIENT WHERE id='$id'";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$case = $row['case_id'];
$name = $row['name'];
$email = $row['email_id'];
$contact = $row['contact_no'];
$sql = "SELECT type,name FROM CASES";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$case_type = $row['type'];
$case_name = $row['name'];
$sql = "SELECT case_history FROM CASE_HISTORY where case_id='$case'";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$history = $row['case_history'];
$sql = "SELECT status FROM CASE_STATUS where case_id ='$case'";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$status = $row['status'];
$sql = "SELECT billable_hours,rate FROM CASE_TRANSACTIONS WHERE client_id = '$id' ";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$hours = $row['billable_hours'];
$rate = $row['rate'];
$sql = "SELECT * FROM CALENDAR WHERE case_id= '$case' ";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$date = 'To Be Decided';
$priority = '-';
if(mysql_num_rows($row) != 0){
	$date = $row['date_of_hearing'];
	$priority = $row['priority'];
}
?>
<html>
<head>
</head>
<body>
<?php 
echo "ID: ".$id."<br />";
echo "Name: ".$name."<br />";
echo "Case ID: ".$case."<br />";
echo "Email: ".$email."<br />";
echo "Contact No.: ".$contact."<br />";
echo "Case name: ".$case_name."<br />";
echo "Case History: ".$history."<br />";
echo "Case Status: ".$status."<br />";
echo "Bill: Rs. ".$hours*$rate."/-<br />";
echo "Date Of Hearing: ".$date."<br />";
echo "Priority of Hearing: ".$priority."<br />";
?>
<a href="client_password.php">Change password</a>
<?php 
session_start();
require("check_login.php");
echo "<br />hello ".$_SESSION['username'];
echo "<br />";
echo "<a href='logout.php'>Logout</a>";
?>
</body>
</html>