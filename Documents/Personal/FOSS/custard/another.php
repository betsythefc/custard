<?php\n\t$host = 'localhost';\n\t$database = 'custard';\n\t$username = 'custard_admin';\n\t$password = 'apache';\n\n\ttry {\n\t\t$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);\n\t}\n\n\tcatch(PDOException $e) {\n\t\techo $e->getMessage();\n\t}\n\n\t$sql = $DBH->prepare('INSERT INTO csat VALUES (2)');\n\t$sql->execute();\n\techo "Done"\n?>
<?php\n\t$host = 'localhost';\n\t$database = 'custard';\n\t$username = 'custard_admin';\n\t$password = 'apache';\n\n\ttry {\n\t\t$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);\n\t}\n\n\tcatch(PDOException $e) {\n\t\techo $e->getMessage();\n\t}\n\n\t$sql = $DBH->prepare('INSERT INTO csat VALUES (2)');\n\t$sql->execute();\n\techo "Done"\n?>
<?php\n\t$host = 'localhost';\n\t$database = 'custard';\n\t$username = 'custard_admin';\n\t$password = 'apache';\n\n\ttry {\n\t\t$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);\n\t}\n\n\tcatch(PDOException $e) {\n\t\techo $e->getMessage();\n\t}\n\n\t$sql = $DBH->prepare('INSERT INTO csat VALUES (2)');\n\t$sql->execute();\n\techo "Done"\n?>
<?php\n\t$host = 'localhost';\n\t$database = 'custard';\n\t$username = 'custard_admin';\n\t$password = 'apache';\n\n\ttry {\n\t\t$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);\n\t}\n\n\tcatch(PDOException $e) {\n\t\techo $e->getMessage();\n\t}\n\n\t$sql = $DBH->prepare('INSERT INTO csat VALUES (2)');\n\t$sql->execute();\n\techo "Done"\n?>
<?php
	$host = 'localhost';
	$database = 'custard';
	$username = 'custard_admin';
	$password = 'apache';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$sql = $DBH->prepare('INSERT INTO csat VALUES (2)');
	$sql->execute();
	$sql = $DBH->prepare('DELETE FROM links WHERE link = 23391');
	$sql->execute();
	echo "Done"
?>
<?php
	$host = 'localhost';
	$database = 'custard';
	$username = 'custard_admin';
	$password = 'apache';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$sql = $DBH->prepare('INSERT INTO csat VALUES (1)');
	$sql->execute();
	$sql = $DBH->prepare('DELETE FROM links WHERE link = 23391');
	$sql->execute();
	echo "Done"
?>
<?php
	$host = 'localhost';
	$database = 'custard';
	$username = 'custard_admin';
	$password = 'apache';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$sql = $DBH->prepare('INSERT INTO csat VALUES (0)');
	$sql->execute();
	$sql = $DBH->prepare('DELETE FROM links WHERE link = 23391');
	$sql->execute();
	echo "Done"
?>
<?php
	$host = 'localhost';
	$database = 'custard';
	$username = 'custard_admin';
	$password = 'apache';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$sql = $DBH->prepare('INSERT INTO csat VALUES (2)');
	$sql->execute();
	$sql = $DBH->prepare('DELETE FROM links WHERE link = 32277');
	$sql->execute();
	echo "Done"
?>
<?php
	$host = 'localhost';
	$database = 'custard';
	$username = 'custard_admin';
	$password = 'apache';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$sql = $DBH->prepare('INSERT INTO csat VALUES (1)');
	$sql->execute();
	$sql = $DBH->prepare('DELETE FROM links WHERE link = 32277');
	$sql->execute();
	echo "Done"
?>
<?php
	$host = 'localhost';
	$database = 'custard';
	$username = 'custard_admin';
	$password = 'apache';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$sql = $DBH->prepare('INSERT INTO csat VALUES (0)');
	$sql->execute();
	$sql = $DBH->prepare('DELETE FROM links WHERE link = 32277');
	$sql->execute();
	echo "Done"
?>
<?php
	$host = 'localhost';
	$database = 'custard';
	$username = 'custard_admin';
	$password = 'apache';

	try {
		$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
	}

	catch(PDOException $e) {
		echo $e->getMessage();
	}

	$sql = $DBH->prepare('INSERT INTO csat VALUES (1)');
	$sql->execute();
	$sql = $DBH->prepare('DELETE FROM links WHERE link = 20105');
	$sql->execute();
	echo "Done"
?>
