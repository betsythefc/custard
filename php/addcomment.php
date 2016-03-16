<?php
	$Comment = $_POST['comment'];
	$ID = $_GET['id'];
	require 'mysqlconnect.php';

	$sql = $DBH->prepare("UPDATE csat SET comment='$Comment' WHERE id='$ID'");
	$sql->execute();
	
	echo "Thank you for submitting a comment.";
?>
