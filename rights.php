<?php
	require 'mysqlconnect.php';
	$LoggedInUserName = $_SESSION['SESS_FIRST_NAME'];
	$UserTypeQuery = $DBH->prepare("SELECT user_type AS UserType FROM member WHERE username='$LoggedInUserName'");
	$UserTypeQuery->execute();
	$UserType = $UserTypeQuery->fetch();
	$Role = "{$UserType[UserType]}";
?>
