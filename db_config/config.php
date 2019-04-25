<?php 
	ob_start(); // Turns on output buffering 
	$con = mysqli_connect("localhost","root","","DW_00159062"); // Connection variable
	if(mysqli_connect_errno()){
		echo "Failed to connect: " . mysqli_connect_errno();
	}
?>