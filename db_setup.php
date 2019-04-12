<?php
	//Include dB connection file
	include_once 'db_config/config.php';

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
	$sqltoCreateUsers = "CREATE TABLE `curious_CS`.`users` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `first_name` varchar(20) NOT NULL,
  `last_name` varchar(20) NOT NULL,
  `business_name` varchar(50) NOT NULL,
  `job_title` varchar(50) NOT NULL,
  `interested_area` varchar(255) NOT NULL,
  `email` varchar(80) NOT NULL,
  `username` varchar(30) NOT NULL,
  `password` varchar(150) NOT NULL,,
  `user_type` int(2) NOT NULL,
  `registration_no` varchar(10) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
";

if ($con->query($sqltoCreateUsers) === TRUE) {
		echo "users table created successfully<br>";
	} else {
		echo "Error: " . $sqltoCreateUsers . "<br>" . $con->error. "<br>";
	}


//insert data into users 
	$insertsql = "INSERT INTO `curious_CS`.`users` (`id`,`first_name`,`last_name`, `business_name`, `job_title`, `interested_area`, `email`, `username`, `password`, `user_type`) 
	VALUES('','Shamsur','Robb', 'Business Name', 'Developer', 'Network', 'robb@gmail.com', 'shamsur', 'e10adc3949ba59abbe56e057f20f883e', '0'), ('','Admin','admin', 'Business Name', 'Developer', 'Network', 'admin@gmail.com', 'admin', 'e10adc3949ba59abbe56e057f20f883e', '1');";

	if ($con->query($insertsql) === TRUE) {
		echo "user admin created successfully<br>
		email:belal@gmail.com<br>password:123456<br>";
	} else {
		echo "Error: " . $insertsql . "<br>" . $con->error. "<br>";
	}



	//SQL to create table services
	$sqltoCreateService = "CREATE TABLE `sal`.`servieces` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `service_title` varchar(200) NOT NULL,
  `description` text NOT NULL,
  `cost` decimal(10,0) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
";

	if ($con->query($sqltoCreateService) === TRUE) {
		echo "Servieces table created successfully<br>";
	} else {
		echo "Error: " . $sqltoCreateService . "<br>" . $con->error. "<br>";
	}


	//SQL to create table booking
	$sqltoCreateBooking = "CREATE TABLE `sal`.`booking` (
  `id` int(11) NOT NULL AUTO_INCREMENT,
  `customer_id` int(11) NOT NULL,
  `services_id` int(11) NOT NULL,
  PRIMARY KEY (`id`)
) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;
";

	if ($con->query($sqltoCreateBooking) === TRUE) {
		echo "forum_comment table created successfully<br>";
	} else {
		echo "Error: " . $sqltoCreateBooking . "<br>" . $con->error. "<br>";
	}
?>