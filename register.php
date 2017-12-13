<?php
require 'config/config.php';
require 'includes/form_handlers/register_handler.php';
require 'includes/form_handlers/login_handler.php';

?>
<!DOCTYPE html>
<html>
<head>
	<title>Welcome to Blahbebs</title>
	<link rel="stylesheet" type="text/css" href="assets/css/register_style.css">
</head>
<body>
	<div class="wrapper">

		<div class="login_box">




			<form action="register.php" method="POST">
				<input type="email" name="log_email" placeholder="Email Address" 

				value= "<?php  if(isset($_SESSION['log_email'])){
				echo($_SESSION['log_email']);}?>" required>

				<br>
				<input type="password" name="log_password" placeholder="Password">
				<br>
				<input type="submit" name="login_button" value="Login">
				<br>


				<?php
					if(in_array('Email or password was incorrect', $error_array)) echo("Email or password was incorrect");
				?>
			</form>
		<form action="register.php" method="POST">
			<input type="text" name="reg_fname" placeholder="First Name" value= "<?php  if(isset($_SESSION['reg_fname'])){
				echo($_SESSION['reg_fname']);}
				?>" required>
			<br>

			<?php
				if(in_array("Your name must be between 2 and 25 characters <br>",$error_array )) echo "Your name must be between 2 and 25 characters <br>";
			?>


			<input type="text" name="reg_lname" placeholder="Last Name"
			value= "<?php  if(isset($_SESSION['reg_lname'])){
				echo($_SESSION['reg_lname']);}?>" required>
			<br>

			<?php
				if(in_array("Your last name must be between 2 and 25 characters <br>",$error_array )) echo "Your last name must be between 2 and 25 characters <br>";
			?>

			<input type="email" name="reg_email1" placeholder="Email"
			value= "<?php  if(isset($_SESSION['reg_email1'])){
				echo($_SESSION['reg_email1']);}?>"
			required>
			<br>
			<input type="email" name="reg_email2" placeholder="Confirm Email" value= "<?php  if(isset($_SESSION['reg_email2'])){
				echo($_SESSION['reg_email2']);}?>" required>
			<br>

			<?php
				if(in_array("Email already in use <br>",$error_array )) echo "Email already in use <br>";
				else if(in_array("Invalid format <br>",$error_array )) echo "Invalid format <br>";
				else if(in_array("Emails don't match <br>",$error_array )) echo "Emails don't match <br>";
			?>
			<input type="password" name="reg_password1" placeholder="Password"  required>
			<br>
			<input type="password" name="reg_password2" placeholder="Confirm Password" required>
			<br>
			<?php
				if(in_array("passwords dont match <br>",$error_array )) echo "passwords dont match <br>";
				else if(in_array("your password can only contain english characters and numbers <br>",$error_array )) echo "your password can only contain english characters and numbers <br>";
				else if(in_array("Your password must be between 5 and 30 characters <br>",$error_array )) echo "Your password must be between 5 and 30 characters <br>";
			?>

			<input type="submit" name="register_button" value="Register">
			<br>
			<?php
			if(in_array("<span > You are all set !! Go ahead and login !</span><br>",$error_array )) echo "<span style='color: #14C800' > You are all set !! Go ahead and login !</span><br>";
			?>

		</form>

		</div>
</div>
</body>
</html>