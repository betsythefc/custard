<?php
	$mysql_hostname = "localhost";
	$mysql_user = "custard_admin";
	$mysql_password = "apache";
	$mysql_database = "custard";
	$prefix = "";
	$bd = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Could not connect database");
	mysql_select_db($mysql_database, $bd) or die("Could not select database");
?>
