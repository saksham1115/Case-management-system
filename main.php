<?php 
session_start();
require("config.php");
require("check_login.php");
$columns = ['id','name','email_id','license_no','employment','date_of_joining'];
$numFields = count($columns);
$id = $_SESSION['username'];
$sql = "SELECT * FROM LAWYER WHERE id = '$id'";
$value = mysql_query($sql,$conn);
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
                  <li class="active"><a href="#" >Home</a></li>
                  <li><a href="client_register.php" >Register Your Client</a></li>
                  <li><a href="update_password.php">Change Password</a></li>
                  <li><a href="update_case.php" >Update Case Info</a></li>
                  <li><a href="billing.php" >Enter Billing Details</a></li>
                  <li><a href="set_hearing.php">Enter Hearing Date</a></li>
                  <li><a href="enquiries.php">Your Enquiries</a></li>
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
		<h3>Welcome <?php echo $id;?> !!!</h3>
	</div>
	<div class="control-label col-xs-4">
	</div>
	<div class="control-label col-xs-4">
	<ul class="list-group">
<?php 
$rows = mysql_fetch_assoc($value);
	for($i = 0 ; $i < $numFields ; $i++)
		echo "<li class='list-group-item'>".$columns[$i].': '.$rows[$columns[$i]].'</li>';
?>	
</ul>
</div>
<div class="control-label col-xs-4">
	</div>
</body>
</html>