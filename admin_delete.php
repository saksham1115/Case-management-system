<?php
session_start();
require("config.php");
require("check_login.php");
if(isset($_POST['id'])){
	$id = $_POST['id'];
	$sql = "DELETE FROM LAWYER WHERE id = '$id'";
	$value = mysql_query($sql,$conn);
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
                  <li class="active"><a href="#" >Delete Lawyers</a></li>
                  <li><a href="admin_update.php" >Change Password</a></li>
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
<label class="control-label col-xs-4">Case ID:</label> <div class="col-xs-8"><select class="form-control" name = 'id' ><?php 
$id = $_SESSION['username'];
$sql = "SELECT id FROM LAWYER ";
$value = mysql_query($sql,$conn);
while($row = mysql_fetch_assoc($value)){
  $case_id = $row['id'];
  echo "<option value = '$case_id'>$case_id</option>";
}
?>
</select><br /></div>
	<div class = "control-label col-xs-5"></div>
	<div class = "control-label col-xs-2">
	<button type="submit" formaction="<?php $_PHP_SELF ?>" class="btn btn-primary">Submit</button>		
	</div>
	</form>
</body>
</html>