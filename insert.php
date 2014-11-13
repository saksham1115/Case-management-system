<?php
session_start();
unset($_SESSION['a']);unset($_SESSION['b']);unset($_SESSION['p']);
$id = $_POST['id'];
$name = $_POST['name'];
$password = $_POST['password'];
$employment = $_POST['employment'];
$date = $_POST['doj'];
$email = $_POST['email_id'];
$license = $_POST['license_no'];
if($id=='' || $name=='' || $password=='' || $employment=='' || $date=='' || $email=='' || $license==''){
	$_SESSION['b']=1;
	header('Location:admin.php');
}
else{
require("config.php");
$sql = "INSERT INTO LAWYER (id,name,email_id,password,license_no,employment,date_of_joining) VALUES('$id','$name','$email','$password','$license','$employment','$date')";
$value = mysql_query($sql,$conn);
echo mysql_errno();
if(mysql_errno()!=0){
	$_SESSION['p']=1;
}
else {
	$_SESSION['a']=3;
}
header('Location:admin.php');
}
?>