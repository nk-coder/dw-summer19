<?php
	//Include dB connection file
	include_once '../db_config/config.php';

	//SQL to drop database;
	$sqlToDropDB = "DROP DATABASE IF EXISTS curious_CS;";
	if ($connection->query($sqlToDropDB) === TRUE) {
		echo "Database droped successfully<br>";
	} else {
		echo "Error: " . $sqlToDropDB . "<br>" . $connection->error. "<br>";
	}

	//SQL to create database;
	$sqlToCreateDB = "CREATE DATABASE curious_CS;";
	if ($connection->query($sqlToCreateDB) === TRUE) {
		echo "Database created successfully<br>";
	} else {
		echo "Error: " . $sqlToCreateDB . "<br>" . $connection->error. "<br>";
	}
	
	//Creating connection object with database name;
	$sqlToUseDB = "USE curious_CS;";
	if ($connection->query($sqlToUseDB) === TRUE) {
		echo "Database selected successfully<br>";
	} else {
		echo "Error: " . $sqlToUseDB . "<br>" . $connection->error. "<br>";
	}

?>