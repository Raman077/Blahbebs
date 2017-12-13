<?php
require 'config/config.php';

//declaring variables to prervent errors
$fname = "";
$lname = "";
$em = "";
$em2 = "";
$password = "";
$password2 = "";
$date = "";
$error_array = array();


if(isset($_POST['register_button'])){

	//registration form values

	$fname = strip_tags($_POST['reg_fname']); //remove html tags
	$fname = str_replace(' ', '', $fname); //remove spaces
	$fname = ucfirst(strtolower($fname));//uppercase first letter
	$_SESSION['reg_fname']= $fname;

	$lname = strip_tags($_POST['reg_lname']); //remove html tags
	$lname = str_replace(' ', '', $lname); //remove spaces
	$lname = ucfirst(strtolower($lname));//uppercase first 

	$_SESSION['reg_lname']= $lname;

	$em = strip_tags($_POST['reg_email1']); //remove html tags
	$em = str_replace(' ', '', $em); //remove spaces
	$em = ucfirst(strtolower($em));//uppercase first 

	$_SESSION['reg_email1']= $em;

	$em2 = strip_tags($_POST['reg_email2']); //remove html tags
	$em2 = str_replace(' ', '', $em2); //remove spaces
	$em2 = ucfirst(strtolower($em2));//uppercase first 

	$_SESSION['reg_email2']= $em2;

	$password = strip_tags($_POST['reg_password1']); //remove html tags
	$password2 = strip_tags($_POST['reg_password2']); //remove html tags
	$date = date("Y-m-d"); //current date

	if ($em==$em2) {
		# code...

		//check if the email is in the valid format
		if(filter_var($em, FILTER_VALIDATE_EMAIL)){
				$em = filter_var($em, FILTER_VALIDATE_EMAIL);


				//check if email exists
				$e_check = mysqli_query($conn, " SELECT email FROM users WHERE email = '$em'");

					//count number of rows returned 
				$num_rows = mysqli_num_rows($e_check);

				if($num_rows>0){
					array_push($error_array, "Email already in use <br>");
				}

		}
		else{
			array_push($error_array, "Invalid format <br>");
			
		}
	}
	else{
		array_push($error_array, "Emails don't match <br>");
		//echo "";
	}

	if(strlen($fname)>25 || strlen($fname)<2){
		//echo strlen($fname);
		array_push($error_array, "Your name must be between 2 and 25 characters <br>");
		//echo "Your name must be between 2 and 25 characters";
	}

	if(strlen($lname)>25 || strlen($lname)<2){
		//echo strlen($lname);
		array_push($error_array, "Your last name must be between 2 and 25 characters <br>");
		//echo "Your name must be between 2 and 25 characters";
	}

	if($password!=$password2){
		array_push($error_array, "passwords dont match <br>");
		//echo "passwords dont match";
	}
	else{
		if(preg_match('/[^A-Za-z0-9]/', $password)){
			array_push($error_array, "your password can only contain english characters and numbers <br>");
		//	echo "your password can only contain english characters and numbers";
		}
	}
	if(strlen($password) >30 || strlen($password)<5){
		array_push($error_array, "Your password must be between 5 and 30 characters <br>");
		//echo "Your password must be between 5 and 30 characters";
	}

	if(empty($error_array)){

		$password=md5($password);
		$username = strtolower($fname. "_". $lname);

		$check_username_exists = mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");

		$i=0;
		while (mysqli_num_rows($check_username_exists)!=0) {
			$i++;

			$username = $username. "_".$i;

			mysqli_query($conn, "SELECT username FROM users WHERE username = '$username'");
		}
	}

	$rand = rand(1,2);
	if($rand==1){
		$profile_pic = "assets/images/profile_pics/default_pics/boy.jpg";
	}
	else{
		$profile_pic = "assets/images/profile_pics/default_pics/cassandra.jpg";
	}

	$query= mysqli_query($conn,"INSERT INTO users VALUES ('$fname','$lname', '$username', '$em', '$password', '$date', '$profile_pic','0','0','no',',','')");

	array_push($error_array, "<span > You are all set !! Go ahead and login !</span><br>");
	


}
?>