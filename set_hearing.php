<?php
session_start();
require("config.php");
require("check_login.php");
$id = $_SESSION['username'];
if(isset($_POST['date'])){
	$case_id = $_POST['case_id'];
	$date = $_POST['date'];
	$priority = $_POST['priority'];
	$sql = "INSERT INTO CALENDAR (lawyer_id,case_id,date_of_hearing,priority) VALUES ('$id','$case_id','$date','$priority')";
	$value = mysql_query($sql,$conn);
}
?>
<html>
<head>
</head>
<body>
<form method = 'POST' action = '<?php $_PHP_SELF ?>'>
Enter Case ID: <input type = 'text' name = 'case_id'><br />
Enter the date: <input type = 'date' name = 'date'><br />
Select Priority: <select name = 'priority'><br />
<option value = 'Low'>Low</option>
<option value = 'Medium'>Medium</option>
<option value = 'High'>High</option>
</select><br />
<input type="submit"><br />
</form>
</body>
</html>