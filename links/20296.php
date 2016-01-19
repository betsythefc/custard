<html>
	<title>
		Custard
	</title>

	<head>
		<link rel=stylesheet type=text/css href=../report.css>
	</head>

	<body>
		<ul>
			<li>&nbsp&nbsp&nbsp<img src=../img/custard.png width=40px height=40px>&nbsp&nbsp&nbsp</li>
		</ul>

		<div align=center>

<br />
<br />
<br />
<br />
			<?php
				$host = 'localhost';
				$database = 'custard';
				$username = 'custard_admin';
				$password = 'apache';
				$ReviewString = $_GET['review'];
				$Review = (int)$ReviewString;

				try {
					$DBH = new PDO("mysql:host=$host;dbname=$database", $username, $password);
				}

				catch(PDOException $e) {
					echo $e->getMessage();
				}

				$sql = $DBH->prepare('SELECT link FROM links WHERE link = 20296');
				$sql->execute();
				$result = $sql->fetch();

				if (strpos($result,20296) !== false) {
					if ($Review == 0 || $Review == 1 || $Review == 2) {
						$sql = $DBH->prepare("INSERT INTO csat VALUES ($Review)");
						$sql->execute();
						$sql = $DBH->prepare('DELETE FROM links WHERE link = 20296');
						echo "Your review has been submitted.";
					} else {
						 echo "Whoops, there was a problem with your review. Try resubmitting it.";
					}
				} else {
					echo "A review for this ticket has already been submitted.";
				}
			?>

		</div>
	</body>
</html>
