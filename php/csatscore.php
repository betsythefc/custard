<?php
	require "php/mysqlconnect.php";
	$sql = $DBH->prepare('SELECT SUM(Score) AS Score FROM csat');
	$sql->execute();
	$resultPercent = $sql->fetch();
	$Percent = (($resultPercent[Score]) / ($resultTotal[TotalScores] * 2)) * 100;
	$PercentFormatted = round($Percent, 1, PHP_ROUND_HALF_UP);
	if (strlen($PercentFormatted) == 2) {
		echo "$PercentFormatted.0";
	} else {
		echo "$PercentFormatted";
	}
?>
