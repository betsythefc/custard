<?php
	require_once('auth.php');
	require "php/mysqlconnect.php";

	echo '	<html>
			<title>
				Custard
			</title>
		
			<head>';
			require 'php/header_li.php';
		echo '	</head>
		
			<body>';
			require 'php/topmenu.php';
			echo '	<div id="widgets">
					<div id="widgetcontainer">
						<div id="widget">
							<div id="widgettitle">
								Number of reviews<br />
							</div>
							<div id="widgettext">';
								$sql = $DBH->prepare('SELECT COUNT(*) AS TotalScores FROM csat');
								$sql->execute();
								$resultTotal = $sql->fetch();
								print_r($resultTotal[TotalScores]);
					echo '	</div>
					</div>
				</div>';
			?>
			<?php
			echo '	<div id="widgetcontainer">
					<div id="widget">
						<div id="widgettitle">
							CSAT Score
						</div>
						<div id="widgettext">';
								$sql = $DBH->prepare('SELECT SUM(score) AS Score FROM csat');
								$sql->execute();
								$resultPercent = $sql->fetch();
								$Percent = (($resultPercent[Score]) / ($resultTotal[TotalScores] * 2)) * 100;
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
			require 'php/footer.php';
	echo '	</body>
	</html>';
?>

