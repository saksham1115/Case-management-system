<?php
session_start();
require("check_login.php");
require("config.php");
$columns = ['id','name','email_id','license_no','employment','date_of_joining'];
$numFields = count($columns);
$sql = "SELECT * FROM LAWYER";
$value = mysql_query($sql,$conn);
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
                  <li class="active"><a href="#">View Lawyers</a></li>
                  <li><a href="admin_delete.php" >Delete Lawyers</a></li>
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
		<strong><h2>View your Lawyers</h2></strong>
	</div>
	<table class="table table-striped">
	<thead>	
	<th>ID</th>
	<th>Name</th>
	<th>Email</th>
	<th>License</th>
	<th>Employment</th>
	<th>Date of Joining</th>
	</thead>
	<tbody>
<?php 
while($rows = mysql_fetch_assoc($value)){
	echo "<tr>";
	for($i = 0 ; $i < $numFields ; $i++){
		echo "<td>".$rows[$columns[$i]].'</td>';
	}
	echo "</tr>";
}
?>
</tbody>
</table>
</div>
</body>
</html>
