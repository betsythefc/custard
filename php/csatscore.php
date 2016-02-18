<?php
	$sql = $DBH->prepare('SELECT SUM(Score) AS Score FROM csat');
	$sql->execute();
	$resultPercent = $sql->fetch();
	$Percent = (($resultPercent[Score]) / ($resultTotal[TotalScores] * 2)) * 100;
	echo round($Percent, 1, PHP_ROUND_HALF_UP);
?>
