<?php
	require_once('auth.php');
	require "php/mysqlconnect.php";
?>

<html>

	<title>
		Custard
	</title>
	
	<head>
		<?php require 'php/css.php'; ?>
		<link rel="shortcut icon" type="image/png" href="img/custard_favicon.png">
		<link rel="icon" type="image/png" href="img/custard_favicon.png">
	</head>
	
	<body>
	
		<!-- Top Menu -->
			<?php
				require 'php/topmenu.php';
			?>
		
		<!-- Content -->
		<div id="widgets">
			<div id="widgetcontainer">
				<div id="widget">
					<div id="widgettitle">
						Number of reviews<br />
					</div>
					<div id="widgettext">
						<?php							
							$sql = $DBH->prepare('SELECT COUNT(*) AS TotalScores FROM csat');
							$sql->execute();
							$resultTotal = $sql->fetch();
							print_r($resultTotal[TotalScores]);
						?>
					</div>
				</div>
			</div>
			<div id="widgetcontainer">
				<div id="widget">
					<div id="widgettitle">
						CSAT Score
					</div>
					<div id="widgettext">
						<?php
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
						?>
						<br />
						<font size=7>%</font>
					</div>
				</div>
			</div>
		</div>
		<?php 
			require 'php/footer.php';
		?>
	</body>
</html>
