<?php
$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$employment = $_POST['employment'];
$date = $_POST['doj'];
$email = $_POST['email_id'];
$license = $_POST['license_no'];
require("config.php");
$sql = "INSERT INTO LAWYER (id,name,email_id,password,license_no,employement,date_of_joining) VALUES('$id','$name','$email','$password','$license','$employment','$date')";
$value = mysql_query($sql,$conn);
header('Location:admin.php');
?>