<?php
	$Comment = $_POST['comment'];
	$ID = $_GET['id'];
	echo "$Comment";
	echo "$ID";
	require 'mysqlconnect.php';

	$sql = $DBH->prepare("UPDATE csat SET comment='$Comment' WHERE id='$ID'");
	$sql->execute();
?>
