<!DOCTYPE html>

<?php
require 'config/config.php';
//require 'includes/form_handlers/register_handler.php';

$query = mysqli_query($conn, "INSERT INTO test VALUES('1', 'Raman')");
?>
<html>
<head>
	<title>Welcome to blahBebs</title>
</head>
<body>
	welcome to blahbebs
</body>
</html>