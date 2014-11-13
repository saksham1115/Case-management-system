<?php
session_start();
require("config.php");
require("check_login.php");
$id = $_SESSION['username'];
if(isset($_POST['date'])){
	$case_id = $_POST['case_id'];
	$date = $_POST['date'];
	$priority = $_POST['priority'];
	$sql = "INSERT INTO CALENDAR (lawyer_id,case_id,date_of_hearing,priority) VALUES ('$id','$case_id','$date','$priority')";
	$value = mysql_query($sql,$conn);
  echo mysql_errno();
}
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
                  <li><a href="client_register" >Register Your Client</a></li>
                  <li><a href="update_password.php">Change Password</a></li>
                  <li><a href="update_case.php" >Update Case History</a></li>
                  <li><a href="billing.php" >Enter Billing Details</a></li>
                  <li class="active"><a href="#">Enter Hearing Date</a></li>
               </ul>
               <ul class="nav navbar-nav navbar-right">
                <li><a href="logout.php">Logout</a></li>
            </ul>
            </div>
         </div>
      </nav>
</nav>
<div class="container">
	<div class="jumbotron">
		<h3>Set the Hearing Date</h3>
	</div>
	<div class="control-label col-xs-8">
			<form method="POST" class='form-horizontal' action="<?php $_PHP_SELF ?>">
                  <div class='form-group'>
<label class="control-label col-xs-4">Enter Case ID:</label><div class="col-xs-8"> <input class="form-control" type = 'text' name = 'case_id'><br />
</div></div><div class='form-group'>
<label class="control-label col-xs-4">Enter the date:</label><div class="col-xs-8"> <input class="form-control" type = 'date' name = 'date'><br />
</div></div><div class='form-group'>
<label class="control-label col-xs-4">Select Priority:</label><div class="col-xs-8"> <select class="form-control" name = 'priority'><br />
<option value = 'Low'>Low</option>
<option value = 'Medium'>Medium</option>
<option value = 'High'>High</option>
</select><br />
</div></div>
<div class = "control-label col-xs-5"></div>
	<div class = "control-label col-xs-2">
	<button type="submit" formaction="<?php $_PHP_SELF ?>" class="btn btn-primary">Submit</button>		
	</div>
</form>
</body>
</html>