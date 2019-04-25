<?php
	//Include dB connection file
	include_once '../db_config/config.php';

	//SQL to drop database;
	$sqlToDropDB = "DROP DATABASE IF EXISTS DW_00159062;";
	if ($con->query($sqlToDropDB) === TRUE) {
		echo "Database droped successfully<br>";
	} else {
		echo "Error: " . $sqlToDropDB . "<br>" . $con->error. "<br>";
	}

	//SQL to create database;
	$sqlToCreateDB = "CREATE DATABASE DW_00159062;";
	if ($con->query($sqlToCreateDB) === TRUE) {
		echo "Database created successfully<br>";
	} else {
		echo "Error: " . $sqlToCreateDB . "<br>" . $con->error. "<br>";
	}
	
	//Creating connection object with database name;
	$sqlToUseDB = "USE DW_00159062;";
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

	$registration_no = "CUR". mt_rand(100000,999999);
	$registration_no2 = "CUR". mt_rand(100000,999999);
	//insert admin
	$insert_admin = "INSERT INTO `DW_00159062`.`users`(`first_name`,`last_name`,`business_name`,`job_title`,`interested_area`, `email`, `username`, `password`, `user_type`, `registration_no`) VALUES ('Admin','admin', 'CS','Monitoring','Networking','admin@gmail.com','admin123','e10adc3949ba59abbe56e057f20f883e','1','$registration_no');";

	if ($con->query($insert_admin) === TRUE) {
		echo "<br>Admin created successfully<br>
		<b>username:admin123<br>password:123456</b><br><br>";
	} else {
		echo "Error: " . $insert_admin . "<br>" . $con->error. "<br>";
	}

	//insert user
	$insert_user = "INSERT INTO `DW_00159062`.`users`(`first_name`,`last_name`,`business_name`,`job_title`,`interested_area`, `email`, `username`, `password`, `user_type`, `registration_no`) VALUES ('John','Mike', 'CS','Monitoring','Networking','mike@gmail.com','mike123','e10adc3949ba59abbe56e057f20f883e','0','$registration_no2');";

	if ($con->query($insert_user) === TRUE) {
		echo "User created successfully<br>
		<b>username:mike123<br>password:123456</b><br><br>";
	} else {
		echo "Error: " . $insert_user . "<br>" . $con->error. "<br>";
	}

	//SQL to create table training
	$training_sql = "CREATE TABLE training (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `title` varchar(250) NOT NULL,
	  `description` text NOT NULL,
	  `image` varchar(255) NOT NULL,
	  `cost` float NOT NULL,
	  `startDate` date NOT NULL,
	  `start_time` time NOT NULL,
	  `end_time` time NOT NULL,
	  `duration` varchar(10) NOT NULL,
	  `active` varchar(4) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($training_sql) === TRUE) {
		echo "training table created successfully<br>";
	} else {
		echo "Error: " . $training_sql . "<br>" . $con->error. "<br>";
	}

	//insert traingin
	$insert_training = "INSERT INTO `DW_00159062`.`training`(`title`,`description`,`image`,`cost`,`startDate`, `start_time`, `end_time`, `duration`, `active`) VALUES ('IT Security: Defense against the digital dark arts','This course covers a wide variety of IT security concepts, tools, and best practices. It introduces threats and attacks and the many ways they can show up. We’ll give you some background of encryption algorithms and how they’re used to safeguard data. Then, we’ll dive into the three As of information security: authentication, authorization, and accounting. We’ll also cover network security solutions, ranging from firewalls to Wifi encryption options. Finally, we’ll go through a case study, where we examine the security model of Chrome OS. The course is rounded out by putting all these elements together into a multi-layered, in-depth security architecture, followed by recommendations on how to integrate a culture of security into your organization or team.', 'cybersecurity.jpg','500','2019-04-25','12.00.PM','14.00.PM','5 Months','yes');";

	if ($con->query($insert_training) === TRUE) {
		echo "Training added successfully<br>";
	} else {
		echo "Error: " . $insert_training . "<br>" . $con->error. "<br>";
	}

	//SQL to create table service
	$services_sql = "CREATE TABLE services (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `service_title` varchar(255) NOT NULL,
	  `description` text NOT NULL,
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
	  `training_id` int(11) NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($booking_sql) === TRUE) {
		echo "booking table created successfully<br>";
	} else {
		echo "Error: " . $booking_sql . "<br>" . $con->error. "<br>";
	}

	//SQL to create table message
	$message_sql = "CREATE TABLE message (
	  `id` int(11) NOT NULL AUTO_INCREMENT,
	  `sender_name` varchar(40) NOT NULL,
	  `sender_email` varchar(80) NOT NULL,
	  `subject` varchar(255) NOT NULL,
	  `message` text NOT NULL,
	  PRIMARY KEY (`id`)
	) ENGINE=InnoDB AUTO_INCREMENT=16 DEFAULT CHARSET=latin1;";

	if ($con->query($message_sql) === TRUE) {
		echo "message table created successfully<br>";
	} else {
		echo "Error: " . $message_sql . "<br>" . $con->error. "<br>";
	}

?>