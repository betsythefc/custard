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
			<!-- <?php
			
				$sql = $DBH->prepare('SELECT score AS Score, date AS Date, id AS ID FROM csat');
				$sql->execute();
				$result = $sql->fetch();
				print_r($result[Score]);
			
			?> -->
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
