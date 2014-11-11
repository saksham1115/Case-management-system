<?php
session_start();
$login = $_POST['login_type'];
$username = $_POST['username'];
$password = $_POST['password'];
require("config.php");
if($login == 'admin'){
$sql = "SELECT username,password FROM ADMIN WHERE username = '$username'";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
if (!mysql_num_rows($value)){
	echo "login failed";
	echo "<a href='index.php'>CLick here</a>";
}
else {
	if($username != $row['username']){
		echo "login failed";
		echo "<a href='index.php'>CLick here</a>";
	}
	elseif($password != $row['password']){
		echo "login failed";
		echo "<a href='index.php'>CLick here</a>";
	}
	else{
		$_SESSION['logged_in'] = 1;
		$_SESSION['username'] = $username;
		header('Location:admin.php');
	}
}
}
elseif ($login == "lawyer"){
	$sql = "SELECT id,password FROM LAWYER WHERE id = '$username'";
	$value = mysql_query($sql,$conn);
	$row = mysql_fetch_assoc($value);
	if (!mysql_num_rows($value)){
		echo "login failed";
		echo "<a href='index.php'>CLick here</a>";
	}
	else {
		if($username != $row['id']){
			echo "login failed";
			echo "<a href='index.php'>CLick here</a>";
		}
		elseif($password != $row['password']){
			echo "login failed";
			echo "<a href='index.php'>CLick here</a>";
		}
		else{
			$_SESSION['logged_in'] = 2;
			$_SESSION['username'] = $username;
			header('Location:main.php');
		}
	}
}
else{
	$sql = "SELECT id,password FROM Client WHERE id = '$username'";
	$value = mysql_query($sql,$conn);
	$row = mysql_fetch_assoc($value);
	if (!mysql_num_rows($value)){
		echo "login failed";
		echo "<a href='index.php'>CLick here</a>";
	}
	else {
		if($username != $row['id']){
			echo "login failed";
			echo "<a href='index.php'>CLick here</a>";
		}
		elseif($password != $row['password']){
			echo "login failed";
			echo "<a href='index.php'>CLick here</a>";
		}
		else{
			$_SESSION['logged_in'] = 3;
			$_SESSION['username'] = $username;
			header('Location:client.php');
		}
	}

}
?>