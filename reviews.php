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

		<div>
		<br />
		<br />
		<br />
		<br />
		<form>
			<table id="reviews">
				<tr>
				<td><input type="text" name="score"></td>
				<td><input type="text" name="date"></td>
				<td><input type="text" name="id"></td>
				</tr>
		<?php

		$mysql_hostname = "localhost";
		$mysql_user     = "custard_admin";
		$mysql_password = "apache";
		$mysql_database = "custard";
		$bd             = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
		mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");// we are now connected to database

		$result = mysql_query("SELECT * FROM csat"); // selecting data through mysql_query()
		
		echo'<th>Score</th><th>Submitted</th><th>ID</th>'; //table headers

		while($data = mysql_fetch_array($result))
		{
			// we are running a while loop to print all the rows in a table
			$FormattedDateMonth = substr($data['date'], 4, 2);
			$FormattedDateDay = substr($data['date'], 6, 2);
			$FormattedDateYear = substr($data['date'], 0, 4);
			$FormattedDateHour = substr($data['date'], 8, 2);
			$FormattedDateMinute = substr($data['date'], 10, 2);
			$FormattedDateSecond = substr($data['date'], 12, 2);
			echo'<tr>'; // printing table row
			echo '<td>'.$data['score'].'</td><td>'.$FormattedDateMonth.' / '.$FormattedDateDay.' / '.$FormattedDateYear.' '.$FormattedDateHour.':'.$FormattedDateMinute.':'.$FormattedDateSecond.'</td><td>'.$data['id'].'</td>'; // we are looping all data to be printed till last row in the table
			echo'</tr>'; // closing table row
		}

		echo '</table>';  //closing table tag

		?>
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

