<?php
	//Database Credentials
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
?>

<html>

	<title>
		Custard
	</title>
	
	<head>
		<link rel="stylesheet" type="text/css" href="report.css">
		<link rel="shortcut icon" type="image/png" href="img/custard_favicon.png">
		<link rel="icon" type="image/png" href="img/custard_favicon.png">
	</head>
	
	<body>
	
		<!-- Top Menu -->
		<ul>
			<li>&nbsp&nbsp&nbsp<img src="img/custard.png" width=40px height=40px>&nbsp&nbsp&nbsp</li>
			<li><a href="index.php">CSat</a></li>
			<li><a href="reviews.php">Reviews</a></li>
			<li><a href="about.html">About</a></li>
		</ul>
		
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
							$sql = $DBH->prepare('SELECT SUM(Score) AS Score FROM csat');
							$sql->execute();
							$resultPercent = $sql->fetch();
							$Percent = (($resultPercent[Score]) / ($resultTotal[TotalScores] * 2)) * 100;
							echo round($Percent, 1, PHP_ROUND_HALF_UP);
						?>
						<br />
						<font size=7>%</font>
					</div>
				</div>
			</div>
		</div>

	</body>
	
	<!-- 
				Copyright [2015] [Bryce McNab]

	Licensed under the Apache License, Version 2.0 (the "License");
	you may not use this file except in compliance with the License.
	You may obtain a copy of the License at

			http://www.apache.org/licenses/LICENSE-2.0

	Unless required by applicable law or agreed to in writing, software
	distributed under the License is distributed on an "AS IS" BASIS,
	WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
	See the License for the specific language governing permissions and
	limitations under the License.
	-->
	
</html>
