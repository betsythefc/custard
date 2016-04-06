<?php 
	// Dependencies //
	require 'mysql.php';
	$ReviewString = $_GET['review'];
	$Review = (int)$ReviewString;
	$Ticket = $_GET['ticket'];
	$Date = date('YmdHis');
	$Comment = "NULL";
	
	echo '	<html>
			<title>
				Custard
			</title>

			<head>';
				require 'header.php';
		echo '	</head>

			<body>
				<ul id="topmenu">
					<li>&nbsp&nbsp&nbsp<img src="img/custard.png" width=40px height=40px>&nbsp&nbsp&nbsp</li>
				</ul>

				<div align=center>

				<br />
				<br />
				<br />
				<br />';

				$sql = $DBH->prepare("SELECT link FROM links WHERE link = $Ticket");
				$sql->execute();
				$result = $sql->fetch();

				if (strpos($result,$Ticket) !== false) {
					if ($Review == 0 || $Review == 1 || $Review == 2) {
						$sql = $DBH->prepare("INSERT INTO csat VALUES ('$Review','$Date','$Ticket',$Comment)");
						$sql->execute();
						$sql = $DBH->prepare("DELETE FROM links WHERE link = $Ticket");
						$sql->execute();
						echo "Your review has been submitted.<br />
						<br />
						<br />
						<form action=\"addcomment.php?id=$Ticket\" method=\"post\">
							<textarea name=\"comment\" maxlength=\"140\" placeholder=\"Enter your comment here\"></textarea>
							<input type=\"submit\" />
						</form>";
					} else {
						echo "Whoops, there was a problem with your review. Try resubmitting it.";
					}
				} else {
					echo "A review for this ticket has already been submitted.";
				}
			echo '	</div>
			</body>
		</html>';
?>
