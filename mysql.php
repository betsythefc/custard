<?php
	//Database Credentials
	$DatabaseHost = 'localhost';
	$Database = 'custard';
	$DatabaseUsername = 'custard_admin';
	$DatabasePassword = 'apache';

	try {
		$DBH = new PDO("mysql:host=$DatabaseHost;dbname=$Database", $DatabaseUsername, $DatabasePassword);
	}
	
	catch(PDOException $e) {
		echo $e->getMessage();
	}
?>
