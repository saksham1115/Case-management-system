<?php 
session_start();
require("check_login.php");
echo "hello ".$_SESSION['username'];
echo "<br>";
echo "<a href='logout.php'>Logout</a>";
?>
<html>
<body>
<h1>WELCOME LAWYER</h1>
</body>
</html>