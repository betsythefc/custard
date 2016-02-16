<?php
		//Variables
		$SearchScore = $_GET['score'];
		$SearchDateString = $_GET['date'];
		$SearchDateString = str_replace("-","",$SearchDateString);
		$SearchDateString = str_replace("T","",$SearchDateString);
		$SearchDate = str_replace(":","",$SearchDateString);
		$SearchTimeString = $_GET['time'];
		$SearchTime = str_replace(":","",$SearchTimeString);
		$SearchID = $_GET['id'];
		$SearchComment = $_GET['comment'];
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
					<th><input type="number" name="score" placeholder="Score" value="<?php echo $SearchScore; ?>" min="0" max="2" class="reviewsearch"></th>
					<th><input type="date" name="date" placeholder="Date" value="<?php echo $SearchDateString; ?>" class="reviewsearch">&nbsp;&nbsp;<input type="time" name="time" placeholder="Time" class="reviewsearch"></th>
					<th><input type="text" name="id" placeholder="ID" value="<?php echo $SearchID; ?>" class="reviewsearch"></th>
				</tr>
				<tr>
					<td class="searchoptions"><input type="button" name="export" value="Export to CSV"></td>
					<td class="searchoptions"></td>
					<td class="searchoptions"><input type="submit" name="submit" value="Search"></td>
				</tr>
		<?php

		$mysql_hostname = "localhost";
		$mysql_user     = "custard_admin";
		$mysql_password = "apache";
		$mysql_database = "custard";
		$bd             = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
		
		mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");// we are now connected to database

		$result = mysql_query("SELECT * FROM csat WHERE score LIKE '%$SearchScore%' AND date LIKE '%$SearchDate$SearchTime%' AND id LIKE '%$SearchID%'"); // selecting data through mysql_query()

		while($data = mysql_fetch_array($result))
		{
			// we are running a while loop to print all the rows in a table
			$FormattedDateMonth = substr($data['date'], 4, 2);
			$FormattedDateDay = substr($data['date'], 6, 2);
			$FormattedDateYear = substr($data['date'], 0, 4);
			$FormattedDateHour = substr($data['date'], 8, 2);
			if ($FormattedDateHour > 12) {
				$FormattedDateHour = $FormattedDateHour - 12;
				$AMorPM = "PM";
				if ($FormattedDateHour < 10) {
					$FormattedDateHour = "0$FormattedDateHour";
				}
			} else {
				$AMorPM = "AM";
			}
			$FormattedDateMinute = substr($data['date'], 10, 2);
			$FormattedDateSecond = substr($data['date'], 12, 2);
			
			echo'<tr>'; // printing table row
			echo '<td class="scorecolumn">'.$data['score'].'</td>
			<td class="datecolumn">'.$FormattedDateMonth.' / '.$FormattedDateDay.' / '.$FormattedDateYear.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$FormattedDateHour.':'.$FormattedDateMinute.':'.$FormattedDateSecond.'&nbsp;&nbsp;'.$AMorPM.'</td>
			<td class="idcolumn">'.$data['id'].'</td>';
			// we are looping all data to be printed till last row in the table
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

