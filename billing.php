<?php
session_start();
require("check_login.php");
require("config.php");
if(isset($_POST['date'])){
	$id = $_SESSION['username'];
	$date = $_POST['date'];
	$hours = $_POST['hours'];
	$client = $_POST['client_id'];
	$case = $_POST['case_id'];
	$rate = $_POST['rate'];
	$pass = $_POST['id'];
	$sql = "INSERT INTO CASE_TRANSACTIONS (lawyer_id,case_id,client_id,start_date,billable_hours,id,rate) VALUES ('$id','$case','$client','$date','$hours','$pass','$rate') ";
	$value = mysql_query($sql,$conn);

}
?>
<html>
<head>
</head>
<body>
<form action = '<?php $_PHP_SELF ?>' method = 'POST'>
client id: <input type = 'text' name = 'client_id'><br />
case id: <input type = 'text' name = 'case_id'><br />
start date : <input type = 'date' name = 'date'><br />
billable hours : <input type = 'number' step='any' name = 'hours'><br />
<?php
$pass = '';
$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 12; $i++) {
        $n = rand(0,60);
        $pass = $pass.$alphabet[$n];
    }
?>
<input type = 'hidden' name = 'id' value ='<?php echo $pass?>'>
rate : <input type = 'number' step='any' name = 'rate'><br />
<input type = 'submit'><br />
</form>
</body>
</html>