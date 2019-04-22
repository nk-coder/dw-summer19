<?php
	//Include dB connection file
	include_once '../db_config/config.php';

	//SQL to drop database;
	$sqlToDropDB = "DROP DATABASE IF EXISTS curious_CS;";
	if ($con->query($sqlToDropDB) === TRUE) {
		echo "Database droped successfully<br>";
	} else {
		echo "Error: " . $sqlToDropDB . "<br>" . $con->error. "<br>";
	}

	//SQL to create database;
	$sqlToCreateDB = "CREATE DATABASE curious_CS;";
	if ($con->query($sqlToCreateDB) === TRUE) {
		echo "Database created successfully<br>";
	} else {
		echo "Error: " . $sqlToCreateDB . "<br>" . $con->error. "<br>";
	}
	
	//Creating connection object with database name;
	$sqlToUseDB = "USE curious_CS;";
	if ($con->query($sqlToUseDB) === TRUE) {
		echo "Database selected successfully<br>";
	} else {
		echo "Error: " . $sqlToUseDB . "<br>" . $con->error. "<br>";
	}

	//SQL to create table users
	$user_sql = "CREATE TABLE users (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `first_name` varchar(20) NOT NULL,
	  `last_name` varchar(20) NOT NULL,
	  `business_name` varchar(50) NOT NULL,
	  `job_title` varchar(50) NOT NULL,
	  `interested_area` varchar(255) NOT NULL,
	  `email` varchar(100) NOT NULL,
	  `username` varchar(30) NOT NULL,
	  `password` varchar(255) NOT NULL,
      `user_type` int(2) NOT NULL,
      `registration_no` varchar(10) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($user_sql) === TRUE) {
		echo "users table created successfully<br>";
	} else {
		echo "Error: " . $user_sql . "<br>" . $con->error. "<br>";
	}

	//SQL to create table service
	$services_sql = "CREATE TABLE services (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `service_title` varchar(255) NOT NULL,
	  `description` text NOT NULL,
	  `cost` decimal(10,0) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($services_sql) === TRUE) {
		echo "services table created successfully<br>";
	} else {
		echo "Error: " . $services_sql . "<br>" . $con->error. "<br>";
	}

	//SQL to create table booking
	$booking_sql = "CREATE TABLE booking (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `customer_id` int(11) NOT NULL,
	  `service_id` int(11) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($booking_sql) === TRUE) {
		echo "booking table created successfully<br>";
	} else {
		echo "Error: " . $booking_sql . "<br>" . $con->error. "<br>";
	}

?>