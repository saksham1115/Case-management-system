<?php
session_start();
require("config.php");
require("check_login.php");
$id = $_SESSION['username'];
$sql = "SELECT id,lawyer_id,case_id,name,email_id,contact_no FROM CLIENT WHERE id='$id'";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$case = $row['case_id'];
$name = $row['name'];
$email = $row['email_id'];
$contact = $row['contact_no'];
$sql = "SELECT type,name FROM CASES";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$case_type = $row['type'];
$case_name = $row['name'];
$sql = "SELECT case_history FROM CASE_HISTORY where case_id='$case'";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$history = $row['case_history'];
$sql = "SELECT status FROM CASE_STATUS where case_id ='$case'";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$status = $row['status'];
$sql = "SELECT billable_hours,rate FROM CASE_TRANSACTIONS WHERE client_id = '$id' ";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$hours = $row['billable_hours'];
$rate = $row['rate'];
$sql = "SELECT * FROM CALENDAR WHERE case_id= '$case' ";
$value = mysql_query($sql,$conn);
$row = mysql_fetch_assoc($value);
$date = $row['date_of_hearing'];
$priority = $row['priority'];
if(mysql_num_rows($row) != 0){
	$date = $row['date_of_hearing'];
	$priority = $row['priority'];
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Legally Right | <?php echo $id?></title>
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
               <a class="navbar-brand" href="#">Legally Right | <?php echo $id?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <ul class="nav navbar-nav">
                  <li class="active"><a href="#" >Home</a></li>
                  <li><a href="client_password.php" >Change Password</a></li>
               </ul>
            <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
            </ul>
         </div>
      </nav>
</nav>
<div class="container">
	<div class="jumbotron">
	<h3>Details</h3>
	<div class="control-label col-xs-2"></div>
	<div class="control-label col-xs-8">
<table class="table table-striped">
<tbody>
<?php 
echo "<tr><td>ID: </td><td>".$id."</td><br />";
echo "<tr><td>Name: </td><td>".$name."</td><br />";
echo "<tr><td>Case ID: </td><td>".$case."</td><br />";
echo "<tr><td>Email: </td><td>".$email."</td><br />";
echo "<tr><td>Contact No.: </td><td>".$contact."</td><br />";
echo "<tr><td>Case name: </td><td>".$case_name."</td><br />";
echo "<tr><td>Case History: </td><td>".$history."</td><br />";
echo "<tr><td>Case Status: </td><td>".$status."</td><br />";
echo "<tr><td>Bill: Rs. </td><td>".$hours*$rate."/-</td><br />";
echo "<tr><td>Date Of Hearing: </td><td>".$date."</td><br />";
echo "<tr><td>Priority of Hearing: </td><td>".$priority."</td><br />";
?>
</tbody>
</table>
</body>
</html>