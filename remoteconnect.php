<?php
	//Database Credentials
	$host = '192.168.8.30';
	$database = 'ost';
	$username = 'osticket_db';
	$password = 'apache';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	}
	
	catch(PDOException $e) {
		echo $e->getMessage();
	}
	
	$sql = $DBH->prepare("SELECT number AS 'TicketID', status_id FROM ost_ticket WHERE status_id = 1;");
	$sql->execute();
	$result = $sql->fetch();
	echo "${result['TicketID']}";
?>
