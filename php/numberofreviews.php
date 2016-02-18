<?php
	$sql = $DBH->prepare('SELECT COUNT(*) AS TotalScores FROM csat');
	$sql->execute();
	$resultTotal = $sql->fetch();
	print_r($resultTotal[TotalScores]);
?>
