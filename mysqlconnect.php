<?php
	//Database Credentials
	$host = 'localhost';
	$database = 'custard';
	$DBUsername = 'custard_admin';
	$password = 'apache';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $DBUsername, $password);
	}
	
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>
