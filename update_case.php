<?php
session_start();
$id = $_SESSION['username'];
require('config.php');
require('check_login.php');
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Legally Right | <?php echo $id ;?></title>
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
               <a class="navbar-brand" href="#">Legally Right | <?php echo $id ;?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <ul class="nav navbar-nav">
                  <li><a href="main.php" >Home</a></li>
                  <li><a href="client_register.php" >Register Your Client</a></li>
                  <li><a href="update_password.php">Change Password</a></li>
                  <li class="active"><a href="#" >Update Case History</a></li>
                  <li><a href="billing.php" >Enter Billing Details</a></li>
                  <li><a href="set_hearing.php">Enter Hearing Date</a></li>
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
			<form method="POST" class='form-horizontal' action="<?php $_PHP_SELF ?>">
                  <div class='form-group'>
<label class="control-label col-xs-4">Case ID:</label> <div class="col-xs-8"><select class="form-control" name = 'case_id' ><?php 
$id = $_SESSION['username'];
$sql = "SELECT id FROM CASES WHERE lawyer_id = '$id'";
$value = mysql_query($sql,$conn);
while($row = mysql_fetch_assoc($value)){
	$case_id = $row['id'];
	echo "<option value = '$case_id'>$case_id</option>";
}
?>
</select><br /></div>
<div class="col-xs-5"></div>
<div class="col-xs-5">
                     <br />
                     <button type="submit" formaction="<?php $_PHP_SELF ?>" class="btn btn-primary">Submit</button>
</div>
</form>
<table class="table table-striped">
<?php 
if(isset($_POST['case_id'])){
	$id = $_POST['case_id'];
	unset($_POST['case_id']);
	$sql = "SELECT * FROM CASES WHERE id = '$id' ";
	$value = mysql_query($sql,$conn);
	$row = mysql_fetch_assoc($value);
	$client = $row['client_id'];
	$case_type = $row['type'];
	$case_name = $row['name'];
	$sql = "SELECT name,email_id,contact_no FROM CLIENT WHERE id = '$client'";
	$value = mysql_query($sql,$conn);
	$row = mysql_fetch_assoc($value);
	$client_name = $row['name'];
	$client_email = $row['email_id'];
	$client_contact = $row['contact_no'];
	$sql = "SELECT case_history FROM CASE_HISTORY WHERE case_id = '$id'";
	$value = mysql_query($sql,$conn);
	$row = mysql_fetch_assoc($value);
	$history = $row['case_history'];
	$sql = "SELECT status FROM CASE_STATUS WHERE case_id = '$id'";
	$value = mysql_query($sql,$conn);
	$row  = mysql_fetch_assoc($value);
	$status = $row['status'];
	$sql = "SELECT verdict FROM CASE_VERDICT WHERE case_id = '$id'";
	$value = mysql_query($sql,$conn);
	$row  = mysql_fetch_assoc($value);
	$verdict = $row['verdict'];
	echo "<tr><td>CASE ID </td><td> ".$id."</td></tr><br />";
	echo "<tr><td>CLIENT ID </td><td> ".$client."</td></tr><br />";
	echo "<tr><td>CLIENT NAME </td><td> ".$client_name."</td></tr></td></tr><br />";
	echo "<tr><td>CLIENT EMAIL </td><td> ".$client_email."</td></tr><br />";
	echo "<tr><td>CLIENT CONTACT NUMBER </td><td> ".$client_contact."</td></tr><br />";
	echo "<tr><td>CASE NAME </td><td> ".$case_name."</td></tr><br />";
	echo "<tr><td>CASE TYPE </td><td> ".$case_type."</td></tr><br />";
	echo "<tr><td>CASE HISTORY </td><td> ".$history."</td></tr><br />";
	echo "<tr><td>CASE STATUS </td><td> ".$status."</td></tr><br />";
	echo "<tr><td>CASE VERDICT </td><td> ".$verdict."</td></tr><br />";
?>
</table>
<div class="control-label col-xs-8">
<form method="POST" class='form-horizontal' action="update.php">
	<div class='form-group'>
<input name = 'id' type = "hidden" value = <?php echo $id;?>>
<label class="control-label col-xs-4">Update: </label>
<div class="col-xs-8">
<select name = 'update' class="form-control">
<option value = 'history'>CASE HISTORY</option>
<option value = 'status'>CASE STATUS</option>
<option value = 'verdict'>CASE VERDICT</option>
</select></div>
</div>
<div class='form-group'>
<label class="control-label col-xs-4">Enter:</label><div class="col-xs-8"> <input class='form-control' name = 'input' type = 'text'></div>
</div>
<div class = "control-label col-xs-4"></div>
<div class = "control-label col-xs-4">
                     <br />
                     <button type="submit" formaction="update.php" class="btn btn-primary">Update</button>
                     </div>
</form>
<?php
}
?>
</div>
</body>
</html>