<?php 
	ob_start(); // Turns on output buffering 
	//$timezone = date_default_timezone_set("Asia/Dhaka");
	//session_start();
	$con = mysqli_connect("localhost","root","","curious_CS"); // Connection variable
	if(mysqli_connect_errno()){
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>