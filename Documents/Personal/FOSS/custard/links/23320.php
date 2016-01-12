<?php
	$host = 'localhost';
	$database = 'custard';
	$username = 'custard_admin';
	$password = 'apache';
	$Review = $_GET['review'];

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$sql = $DBH->prepare('SELECT link FROM links WHERE link = 23320');
		$sql->execute();
		$result = $sql->fetch();
		if (strpos($result,23320) !== false) {
			$sql = $DBH->prepare("INSERT INTO csat VALUES ($Review)");
			$sql->execute();
			$sql = $DBH->prepare('DELETE FROM links WHERE link = 23320');
			$sql->execute();
			echo "Your review has been submitted.";
		} else {
			echo "A review for this ticket has already been submitted.";
		}
?>
