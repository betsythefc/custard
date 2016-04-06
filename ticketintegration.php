<?php
	require 'mysql.php';
	
	$DBType = $_POST['dbtype'];
	if ("$DBType" == "disabled") {
		$DBHost = "NULL";
		$DBName = "NULL";
		$DBUsername = "NULL";
		$DBPassword = "NULL";
		$DBPasswordVerify = "NULL";
		$DBQuery = "NULL";
	} else {
		$DBHost = $_POST['dbhost'];
		$DBName = $_POST['dbname'];
		$DBUsername = $_POST['dbusername'];
		$DBPassword = $_POST['dbpw'];
		$DBPasswordVerify = $_POST['dbpw_verify'];
		$DBQuery = $_POST['dbquery'];
	}
	
	$sql = $DBH->prepare("UPDATE settings SET parameter='$DBType' WHERE setting='ticket_integration'");
	$sql->execute();
	$sql = $DBH->prepare("UPDATE settings SET parameter='$DBName' WHERE setting='ticket_integration_db'");
	$sql->execute();
	$sql = $DBH->prepare("UPDATE settings SET parameter='$DBHost' WHERE setting='ticket_integration_db_host'");
	$sql->execute();
	$sql = $DBH->prepare("UPDATE settings SET parameter='$DBUsername' WHERE setting='ticket_integration_db_user'");
	$sql->execute();
	$sql = $DBH->prepare("UPDATE settings SET parameter='$DBPassword' WHERE setting='ticket_integration_db_pw'");
	$sql->execute();
	$sql = $DBH->prepare("UPDATE settings SET parameter='$DBQuery' WHERE setting='ticket_integration_query'");
	$sql->execute();
	
	header("location: settings.php?section=admin&page=integration&msg=5");
?>
