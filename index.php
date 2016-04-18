<?php
	require_once('auth.php');
	require 'mysql.php';

	echo '	<html>
			<title>
				Custard
			</title>
		
			<head>';
			$PageName = "Dashboard";
			require 'header.php';
		echo '	</head>
		
			<body>';
			require 'menu.php';
			echo '	<div class="widget">
					<div id="container">
						<div id="widget">
							<div id="title">
								Number of reviews<br />
							</div>
							<div id="text">';
								$sql = $DBH->prepare('SELECT COUNT(*) AS TotalScores FROM csat');
								$sql->execute();
								$resultTotal = $sql->fetch();
								echo "{$resultTotal[TotalScores]}";
						echo '	</div>
						</div>
					</div>';
				echo '	<div id="container">
						<div id="widget">
							<div id="title">
								CSAT Score
							</div>
							<div id="text">';
								$sql = $DBH->prepare('SELECT SUM(score) AS Score FROM csat');
								$sql->execute();
								$resultPercent = $sql->fetch();
								$Percent = (("{$resultPercent[Score]}") / ("{$resultTotal[TotalScores]}" * 2)) * 100;
								$PercentFormatted = round($Percent, 1, PHP_ROUND_HALF_UP);
								if (strlen($PercentFormatted) == 2) {
									echo "$PercentFormatted.0";
								} else {
									echo "$PercentFormatted";
								}
							echo '	<br />
								<font size=7>%</font>
							</div>
						</div>
					</div>
				</div>';
			require 'footer.php';
		echo '	</body>
		</html>';
?>

