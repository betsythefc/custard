<?php
		$SearchScore = $_GET['score'];
		$SearchDateString = $_GET['date'];
		$SearchDateString = str_replace("-","",$SearchDateString);
		$SearchDateString = str_replace("T","",$SearchDateString);
		$SearchDate = str_replace(":","",$SearchDateString);
		$SearchTimeString = $_GET['time'];
		$SearchTime = str_replace(":","",$SearchTimeString);
		$SearchID = $_GET['id'];
		$SearchComment = $_GET['comment'];
?>

