<?php
	$ReviewString = $_GET['review'];
	$Review = (int)$ReviewString;
	$Ticket = $_GET['ticket'];
	$Date = date('YmdHis');
	$Comment = "None";
				
	require 'php/mysqlconnect.php';

	$sql = $DBH->prepare("SELECT link FROM links WHERE link = $Ticket");
	$sql->execute();
	$result = $sql->fetch();

	if (strpos($result,$Ticket) !== false) {
		if ($Review == 0 || $Review == 1 || $Review == 2) {
			$sql = $DBH->prepare("INSERT INTO csat VALUES ($Review,$Date,$Ticket)");
			$sql->execute();
			$sql = $DBH->prepare("DELETE FROM links WHERE link = $Ticket");
			$sql->execute();
			echo "Your review has been submitted.";
		} else {
			echo "Whoops, there was a problem with your review. Try resubmitting it.";
		}
	} else {
		echo "A review for this ticket has already been submitted.";
	}
?>
