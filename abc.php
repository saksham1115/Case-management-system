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
                  <li class="active"><a href="#" >Insert Lawyer</a></li>
                  <li><a href="admin_view.php" >View Lawyers</a></li>
                  <li><a href="admin_delete.php" >Delete Lawyers</a></li>
                  <li><a href="admin_update.php" >Change Password</a></li>
               </ul>
            </div>
         </div>
      </nav>>
</nav>
<div class="container">
	<div class="jumbotron">
		<h3>Register your Lawyer</h3>
	</div>
	<div class="control-label col-xs-8">
			<form method="POST" class='form-horizontal' action="insert.php">
                  <div class='form-group'>
                     <label class="control-label col-xs-4">Username:</label><div class="col-xs-8"><input class="form-control" type = 'text' name = 'id'></div><br /><br /><br />
                  </div>
                  <div class='form-group'>
                     <label class="control-label col-xs-4">Name:</label><div class="col-xs-8"><input class="form-control" type = 'text' name = 'name'><br />
                  </div></div>
                  <div class='form-group'>
                     <label class="control-label col-xs-4">Password:</label><div class="col-xs-8"><input class="form-control"  type = 'password' name = 'password'><br />
                  </div></div>
                  <div class='form-group'>
                     <label class="control-label col-xs-4">Email-id:</label><div class="col-xs-8"><input class="form-control"  type = 'text' name = 'email_id'><br />
                  </div></div>
                  <div class='form-group'>
                     <label class="control-label col-xs-4">License no:</label><div class="col-xs-8"><input class="form-control"  type = 'text' name = 'license_no'><br />
                  </div></div>
                  <div class='form-group'>
                        <div class="control-label col-xs-4"><label>Date of Joining:</label></div><div class="col-xs-8"><input class="form-control"  type = 'date' name = 'doj'><br /></div>
                     </div>
                  <div class='form-group'>
                     <label class="control-label col-xs-4">Type:</label>
                     <select name = 'employment' class="control-label col-xs-8">
                        <option value = 'immigration'>Immigration Lawyer</option>
                        <option value = 'family'>Family and Divorce Lawyer</option>
                        <option value = 'government'>Government Lawyer</option>
                        <option value = 'corporate'>Corporate Lawyer</option>
                        <option value = 'paralegal'>Paralegal</option>
                        <option value = 'domestic'>Domestic Lawyer</option>
                        <option value = 'estate'>Real Estate Law Attorney</option>
                     </select>
                     <br />
                     <div class = "control-label col-xs-4"></div>
                     <div class = "control-label col-xs-4">
                     <br />
                     <button type="submit" formaction="insert.php" class="btn btn-primary">Submit</button>
               </form>
               <button type="submit" formaction="logout.php" class="btn btn-primary">logout</button>
               </div>
               <br />
	</div>
	</div>
	<hr>
	<div class="row">
		<div class="col-xs-12">
			<footer>
				<p>&copy; Legally Right</p>
			</footer>
		</div>
	</div>
</div>
</body>
</html>                                		