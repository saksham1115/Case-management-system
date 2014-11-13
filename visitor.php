<?php
session_start();
require("config.php");
if(isset($_SESSION['logged_in'])){
	if($_SESSION['logged_in']==1)
		header('Location:admin.php');
	elseif ($_SESSION['logged_in']==2)
		header('Location:main.php');
	else
		header('Location:client.php');
}
if(isset($_POST['name'])){
	$name = $_POST['name'];
	$email = $_POST['email'];
	$lawyer = $_POST['lawyer'];
	$query = $_POST['query'];
	$sql = "INSERT INTO VISITOR (name,email_id,lawyer,query) VALUES ('$name','$email','$lawyer','$query') ";
	$value = mysql_query($sql,$conn);
}
?>
<html>
<head>
</head>
<body>
<form action = '<?php $_PHP_SELF ?>' method = 'POST'>
Your Name : <input type = 'text' name = 'name'><br />
Your e-mail: <input type = 'text' name = 'email'><br />
Lawyer ID: <select  name = 'lawyer' ><?php 
$sql = "SELECT id FROM LAWYER";
$value = mysql_query($sql,$conn);
while($row = mysql_fetch_assoc($value)){
	$l = $row['id'];
	echo "<option value = '$l'>$l</option>";
}
?>
</select><br />
Your Query: <input type = 'text' name = 'query'><br />
<input type = 'submit'><br />
</form>
<a href = 'index.php'>Go back to main page</a>
</body>
</html>