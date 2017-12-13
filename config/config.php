<?php 
ob_start();// starts output buffer

$timezone = date_default_timezone_set("Europe/London");
    if(!isset($_SESSION)) 
    { 
        session_start(); 
    }
    else
    {
        session_destroy();
        session_start(); 
    }
$conn = mysqli_connect("localhost","root","","social"); //conncectuon variable

if(mysqli_connect_errno()){
	echo "Failed to conect: " . mysqli_connect_errno();
}
?>