<?php
	$password = "apache";
	require_once('php/mysqlconnect.php');
	$sql = $DBH->prepare("SELECT salt FROM member WHERE username='bmcnab'");
	$sql->execute();
	$salt = $sql->fetch();
	echo "${salt[salt]}<br />";
	$salt = $salt[salt];
	$password = "${password}${salt}";
	echo "$password<br />";
	$password = hash('sha256', "$password");
	echo $password;
?>
