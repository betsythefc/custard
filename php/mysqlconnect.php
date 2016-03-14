<?php
	//Database Credentials
	$host = 'localhost';
	$database = 'custard';
	$username = 'custard_admin';
	$password = 'apache';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	}
	
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>
