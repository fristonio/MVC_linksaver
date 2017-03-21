<?php 
	require_once './config.php';

	try{
		$conn = new PDO("mysql:host=$dbhost;dbname=$dbname",$dbuser, $dbpass);
		$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

		$queryTable1 = "CREATE TABLE users(
		uid INT AUTO_INCREMENT PRIMARY KEY,
		username varchar(30) NOT NULL,
		email varchar(30) NOT NULL UNIQUE,
		password varchar(255) NOT NULL,
		verifyHash varchar(255) NOT NULL,
		state varchar(10) NOT NULL DEFAULT 'Inactive');";

		$queryTable2 = "CREATE TABLE links(
		lid INT AUTO_INCREMENT PRIMARY KEY,
		uid INT,
		link varchar(100) NOT NULL,
		description varchar(255),
		FOREIGN KEY(uid) REFERENCES users(uid));";

		$conn->exec($queryTable2);
		$conn->exec($queryTable1);
		
		echo "TABLES LINK AND USER HAS BEEN CREATED IN THE DATABASE";
	}
	catch(PDOException $e) {
    	echo $e->getMessage();
    }

 ?>