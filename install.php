<?php
	require 'mysql.php';
	
	$sql = $DBH->prepare('CREATE TABLE csat (score INT,date VARCHAR(60),id VARCHAR(60),comment VARCHAR(140))');
	$sql->execute();
	$sql = $DBH->prepare('CREATE TABLE links (link INT)');
	$sql->execute();
	$sql = $DBH->prepare('CREATE TABLE member (mem_id int(11) NOT NULL AUTO_INCREMENT, username VARCHAR(30) NOT NULL, password VARCHAR(180) NOT NULL, salt VARCHAR(180) NOT NULL, user_type VARCHAR(10), PRIMARY KEY (mem_id))');
	$sql->execute();
	$sql = $DBH->prepare('CREATE TABLE settings(setting VARCHAR(60) NOT NULL,parameter VARCHAR(120) NOT NULL)');
	$sql->execute();
	$sql = $DBH->prepare("INSERT INTO settings VALUES ('global','theme','light')");
	$sql->execute();
	$sql = $DBH->prepare("INSERT INTO settings VALUES ('global','integration','disabled')");
	$sql->execute();
	$sql = $DBH->prepare("INSERT INTO settings VALUES ('global','integration_db','NULL')");
	$sql->execute();
	$sql = $DBH->prepare("INSERT INTO settings VALUES ('global','integration_db_host','NULL')");
	$sql->execute();
	$sql = $DBH->prepare("INSERT INTO settings VALUES ('global','integration_db_user','NULL')");
	$sql->execute();
	$sql = $DBH->prepare("INSERT INTO settings VALUES ('global','integration_db_pw','NULL')");
	$sql->execute();
	$sql = $DBH->prepare("INSERT INTO settings VALUES ('global','integration_ticketquery','NULL')");
	$sql->execute();
	echo "Setup complete!";
?>
