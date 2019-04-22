<?php
	session_start();
	$_SESSION["email"]= null;
	$_SESSION["username"]= null;
	session_destroy();
	header("Location: login.php");
?>