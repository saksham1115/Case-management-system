<?php
session_start();
require('config.php');
require('check_login.php');
?>
<html>
<head>
</head>
<body>
Please enter the case details for the case id <?php echo $_SESSION['case_id']; ?> of client <?php echo $_SESSION['client']; ?>
<form method = 'POST' action = "<?php $_PHP_SELF ?>">

	
</form>
</body>
</html>