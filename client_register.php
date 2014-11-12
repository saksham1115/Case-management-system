<?php
session_start();
require("config.php");
require('check_login.php');
if(isset($_POST['id'])){
$client = $_POST['id'];
$lawyer = $_SESSION['username'];
$case_id = $_POST['case_id'];
$pass = '';
$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0,50);
        $pass = $pass.$alphabet[$n];
    }
$name = $_POST['name'];
$address = $_POST['address'];
$email_id = $_POST['email_id'];
$contact = $_POST['contact'];
$type = $_POST['type'];
$case_name = $_POST['case_name'];
$sql = "INSERT INTO CLIENT (id,lawyer_id,case_id,password,name,address,email_id,contact_no) VALUES ('$client','$lawyer','$case_id','$pass','$name','$address','$email_id','$contact')";
$value = mysql_query($sql,$conn);
$sql = "INSERT INTO CASES (id,lawyer_id,client_id,type,name) VALUES ('$case_id','$lawyer','$client','$type','$case_name')";
$value = mysql_query($sql,$conn);
$sql = "INSERT INTO CASE_HISTORY (case_id,case_history) VALUES ('$case_id','To be added by lawyer')";
$value = mysql_query($sql,$conn);
$sql = "INSERT INTO CASE_STATUS (case_id,status) VALUES ('$case_id','PENDING')";
$value = mysql_query($sql,$conn);
$sql = "INSERT INTO CASE_VERDICT (case_id,lawyer_id,verdict) VALUES ('$case_id','$lawyer','TO BE DECIDED')";
$value = mysql_query($sql,$conn);
$_SESSION['case_id'] = $case_id;
$_SESSION['client'] = $client;
}
?>
<html>
<head>
</head>
<body>
	<form method = "POST" action = "<?php $_PHP_SELF ?>">
	id: <input name = 'id' type = 'text'><br />
	case id: <input name = 'case_id' type = 'text'><br />
	name: <input name = 'name' type = 'text'><br />
	address: <input name = 'address' type = 'text'><br />
	email_id: <input name = 'email_id' type = 'text'><br />
	contact number: <input name = 'contact' type = 'int'><br />
	case type: <input name = 'type' type = 'text'><br />
	case name: <input name = 'case_name' type = 'text'><br />
	<input type = 'submit'><br />
	</form>
</body>
</html>