<?php
session_start();
require('check_login.php');
require('config.php');
if(isset($_POST['curr_pass'])){
	$password = $_POST['curr_pass'];
	$new_pass = $_POST['new_pass'];
	$re_pass = $_POST['re_pass'];
	if($new_pass != $re_pass){
		unset($_POST['curr_pass']);
		header('Location:admin_update.php');
	}
	$id = $_SESSION['username'];
	$sql = "SELECT username,password FROM ADMIN WHERE username = '$id'";
	$value = mysql_query($sql,$conn);
	echo mysql_error();
	$row = mysql_fetch_assoc($value);
	if($row['password'] != $password){
		unset($_POST['curr_pass']);
		header('Location:admin_update.php');
	}
	$sql = "UPDATE ADMIN SET password = '$new_pass' WHERE username = '$id'";
	$value = mysql_query($sql,$conn);
	echo mysql_error();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Legally Right | Admin</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap-theme.min.css">
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<style type="text/css">
    body{
    	padding-top: 70px;
    }
</style>
</head>
<body>
<nav id="myNavbar" class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
         <!-- Brand and toggle get grouped for better mobile display -->
         <div class="container-fluid">
            <div class="navbar-header">
               <button type="button" class="navbar-toggle" data-toggle="collapse" data-target="#navbarCollapse">
               <span class="sr-only">Toggle navigation</span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               <span class="icon-bar"></span>
               </button>
               <a class="navbar-brand" href="#">Legally Right | Admin</a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <ul class="nav navbar-nav">
                  <li><a href="admin.php" >Insert Lawyer</a></li>
                  <li><a href="admin_view.php" >View Lawyers</a></li>
                  <li><a href="admin_delete.php" >Delete Lawyers</a></li>
                  <li class="active"><a href="#" >Change Password</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
            </ul>
            </div>
         </div>
      </nav>>
</nav>
<div class="container">
	<div class="jumbotron">
		<h3>Delete your Lawyer</h3>
	</div>
	<div class="control-label col-xs-8">
			<form method="POST" class='form-horizontal' action="<?php $_PHP_SELF ?>">
                  <div class='form-group'>
<label class="control-label col-xs-4">Enter current password:</label><div class="col-xs-8"><input class="form-control" name = 'curr_pass' type = 'password'><br />
</div></div>
<div class='form-group'>
<label class="control-label col-xs-4">Enter new password:</label><div class="col-xs-8"> <input class="form-control" name = 'new_pass' type = 'password'><br />
</div></div><div class='form-group'>
<label class="control-label col-xs-4">Re-enter new password:</label><div class="col-xs-8"> <input class="form-control" name = 're_pass' type = 'password'><br />
</div></div>
<div class = "control-label col-xs-5"></div>
	<div class = "control-label col-xs-2">
	<button type="submit" formaction="<?php $_PHP_SELF ?>" class="btn btn-primary">Submit</button>		
	</div>
</form>
</body>
</html>