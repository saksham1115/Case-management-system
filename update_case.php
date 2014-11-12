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
case id: <select  name = 'case_id' ><?php 
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
<?php 
if(isset($_POST['case_id'])){
	$id = $_POST['case_id'];
	unset($_POST['case_id']);
	$sql = "SELECT * FROM CASES WHERE id = '$id' ";
	$value = mysql_query($sql,$conn);
	$row = mysql_fetch_assoc($value);
	$client = $row['client_id'];
	$case_type = $row['type'];
	$case_name = $row['name'];
	$sql = "SELECT name,email_id,contact_no FROM CLIENT WHERE id = '$client'";
	$value = mysql_query($sql,$conn);
	$row = mysql_fetch_assoc($value);
	$client_name = $row['name'];
	$client_email = $row['email_id'];
	$client_contact = $row['contact_no'];
	$sql = "SELECT case_history FROM CASE_HISTORY WHERE case_id = '$id'";
	$value = mysql_query($sql,$conn);
	$row = mysql_fetch_assoc($value);
	$history = $row['case_history'];
	$sql = "SELECT status FROM CASE_STATUS WHERE case_id = '$id'";
	$value = mysql_query($sql,$conn);
	$row  = mysql_fetch_assoc($value);
	$status = $row['status'];
	$sql = "SELECT verdict FROM CASE_VERDICT WHERE case_id = '$id'";
	$value = mysql_query($sql,$conn);
	$row  = mysql_fetch_assoc($value);
	$verdict = $row['verdict'];
	echo "Current details are as follows:<br />";
	echo "CASE ID: ".$id."<br />";
	echo "CLIENT ID: ".$client."<br />";
	echo "CLIENT NAME: ".$client_name."<br />";
	echo "CLIENT EMAIL: ".$client_email."<br />";
	echo "CLIENT CONTACT NUMBER: ".$client_contact."<br />";
	echo "CASE NAME: ".$case_name."<br />";
	echo "CASE TYPE: ".$case_type."<br />";
	echo "CASE HISTORY: ".$history."<br />";
	echo "CASE STATUS: ".$status."<br />";
	echo "CASE VERDICT: ".$verdict."<br />";
?>
<form action ='update.php' method = 'POST'>
<input name = 'id' type = "hidden" value = <?php echo $id;?>>
<select name = 'update'>
<option value = 'history'>CASE HISTORY</option>
<option value = 'status'>CASE STATUS</option>
<option value = 'verdict'>CASE VERDICT</option>
</select>
Enter: <input name = 'input' type = 'text'>
<input type = 'submit'>
</form>
<?php
}
?>
</body>
</html>