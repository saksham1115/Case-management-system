<?php
session_start();
require("config.php");
require('check_login.php');
$lawyer = $_SESSION['username'];
if(isset($_POST['id'])){
$client = $_POST['id'];
$case_id = $_POST['case_id'];
$pass = '';
$alphabet = "abcdefghijklmnopqrstuwxyzABCDEFGHIJKLMNOPQRSTUWXYZ0123456789";
    for ($i = 0; $i < 8; $i++) {
        $n = rand(0,50);
        $pass = $pass.$alphabet[$n];
    }
$name = $_POST['name'];
$address = $_POST['address'];
$email_id = $_POST['email_id'];
$contact = $_POST['contact'];
$type = $_POST['type'];
$case_name = $_POST['case_name'];
$sql = "INSERT INTO CLIENT (id,lawyer_id,case_id,password,name,address,email_id,contact_no) VALUES ('$client','$lawyer','$case_id','$pass','$name','$address','$email_id','$contact')";
$value = mysql_query($sql,$conn);
$sql = "INSERT INTO CASES (id,lawyer_id,client_id,type,name) VALUES ('$case_id','$lawyer','$client','$type','$case_name')";
$value = mysql_query($sql,$conn);
$sql = "INSERT INTO CASE_HISTORY (case_id,case_history) VALUES ('$case_id','To be added by lawyer')";
$value = mysql_query($sql,$conn);
$sql = "INSERT INTO CASE_STATUS (case_id,status) VALUES ('$case_id','PENDING')";
$value = mysql_query($sql,$conn);
$sql = "INSERT INTO CASE_VERDICT (case_id,lawyer_id,verdict) VALUES ('$case_id','$lawyer','TO BE DECIDED')";
$value = mysql_query($sql,$conn);
$_SESSION['case_id'] = $case_id;
$_SESSION['client'] = $client;
}
?>
<html lang="en">
<head>
<meta charset="UTF-8">
<title>Legally Right | <?php echo $lawyer ;?></title>
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
               <a class="navbar-brand" href="#">Legally Right | <?php echo $lawyer ;?></a>
            </div>
            <!-- Collect the nav links, forms, and other content for toggling -->
            <div class="collapse navbar-collapse" id="navbarCollapse">
               <ul class="nav navbar-nav">
                  <li><a href="main.php" >Home</a></li>
                  <li class="active"><a href="#" >Register Your Client</a></li>
                  <li><a href="update_password.php">Change Password</a></li>
                  <li><a href="update_case.php" >Update Case History</a></li>
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
		<h3>Register your client</h3>
	</div>
	<div class="control-label col-xs-8">
			<form method="POST" class='form-horizontal' action="<?php $_PHP_SELF ?>">
                  <div class='form-group'>
	<label class="control-label col-xs-4">ID:</label> <div class="col-xs-8"><input name = 'id' type = 'text'><br />
	</div></div><div class='form-group'>
	<label class="control-label col-xs-4">Case ID:</label> <div class="col-xs-8"><input name = 'case_id' type = 'text'><br />
	</div></div><div class='form-group'>
	<label class="control-label col-xs-4">Client Name: </label><div class="col-xs-8"><input name = 'name' type = 'text'><br />
	</div></div><div class='form-group'>
	<label class="control-label col-xs-4">Address:</label><div class="col-xs-8"> <input name = 'address' type = 'text'><br />
	</div></div><div class='form-group'>
	<label class="control-label col-xs-4">Email:</label><div class="col-xs-8"> <input name = 'email_id' type = 'text'><br />
	</div></div><div class='form-group'>
	<label class="control-label col-xs-4">Contact Number:</label><div class="col-xs-8"> <input name = 'contact' type = 'int'><br />
	</div></div><div class='form-group'>
	<label class="control-label col-xs-4">Case Type:</label><div class="col-xs-8"> <input name = 'type' type = 'text'><br />
	</div></div><div class='form-group'>
	<label class="control-label col-xs-4">Case Name:</label> <div class="col-xs-8"><input name = 'case_name' type = 'text'><br />
	</div></div>
	 <div class="col-xs-5"></div> <div class="col-xs-5"><button type="submit" formaction="<?php $_PHP_SELF ?>" class="btn btn-primary">Submit</button>		
	</form></div>
	</div>
	</div>
</body>
</html>