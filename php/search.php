<?php
		$SearchScoreNumber = $_GET['score'];
		if ($SearchScoreNumber == 0) {
			$SearchScoreNumber = "";
		} else {
			$SearchScore = $SearchScoreNumber - 1;
		}
		

		$SearchMonth = $_GET['month'];
		if (empty($SearchMonth)) {
			$SearchMonth = "__";
		}

		$SearchYear = $_GET['year'];
		if (empty($SearchYear)) {
			$SearchYear = "____";
		}		
		
		$SearchDate = "${SearchYear}${SearchMonth}__";
		$Months = array("Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec");
		
		$SearchTimeString = $_GET['time'];
		if (empty($SearchTimeString)) {
			$SearchTime = "______";
		} else {
			$SearchTime = "${SearchTimeString}____";
		}
		$Hours = array("0", "1", "2", "3", "4", "5", "6", "7", "8", "9", "10", "11", "12", "13", "14", "15", "16", "17", "18", "19", "20", "21", "22", "23");
		
		$SearchDateTime = "${SearchDate}${SearchTime}";
		
		$SearchID = $_GET['id'];
		
		$SearchComment = $_GET['comment'];

		echo '	<form>
				<table id="reviews">
					<tr>
						<th>
							<select name="score" class="scoresearch">';
		//Change to forloop like the Hours dropdown.
		if ($SearchScoreNumber == 0) {
			echo '	<option value="0" selected="selected"></option>
				<option value="1">:(</option>
				<option value="2">:|</option>
				<option value="3">:)</option>';
		} elseif ($SearchScoreNumber == 1) {
			echo '	<option value="0"></option>
				<option value="1" selected="selected">:(</option>
				<option value="2">:|</option>
				<option value="3">:)</option>';
		} elseif ($SearchScoreNumber == 2) {
			echo '	<option value="0"></option>
				<option value="1">:(</option>
				<option value="2" selected="selected">:|</option>
				<option value="3">:)</option>';
		} elseif ($SearchScoreNumber == 3) {
			echo '	<option value="0"></option>
				<option value="1">:(</option>
				<option value="2">:|</option>
				<option value="3" selected="selected">:)</option>';
		}
		
		echo '	</select>
			</th>
			<th>';	
				
				echo '<select name="month">
					<option value="">Month</option>';
					
					$MonthIncrement = 0;
					foreach ($Months as $Month) {
						$MonthIncrement = $MonthIncrement + 1;
						if ($MonthIncrement <= 9) {
							$MonthIncrement = "0$MonthIncrement";
						}
						if ($MonthIncrement == $SearchMonth) {
							echo '<option value="'.$MonthIncrement.'" selected="selected">'.$Month.'</option>';
						} else {
							echo '<option value="'.$MonthIncrement.'">'.$Month.'</option>';
						}
					}
					
			echo '	</select>
				<select name="time">
					<option value="">Hour</option>';
					
					foreach ($Hours as $Hour) {
						if ($Hour == 0 || $Hour == 12) {
							if ($Hour == 0) {
								$TwelveHourFormat = "12 AM";
							} elseif ($Hour == 12) {
								$TwelveHourFormat = "12 PM";
							}
						} elseif ($Hour >= 13) {
							$TwelveHourFormatNumber = $Hour - 12;
							$SearchParamAMorPM = "PM";
							$TwelveHourFormat = "$TwelveHourFormatNumber $SearchParamAMorPM";
						} elseif ($Hour <= 11) {
							if ($Hour >= 10 && $Hour <= 11) {
								$SearchParamAMorPM = "AM";
								$TwelveHourFormat = "$Hour $SearchParamAMorPM";
							} elseif ($Hour <= 9) {
								$SearchParamAMorPM = "AM";
								$TwelveHourFormat = "$Hour $SearchParamAMorPM";
								$Hour = "0$Hour";
							}
						}
						
						if ($SearchTimeString == $Hour) {
							echo '<option value="'.$Hour.'" selected="selected">'.$TwelveHourFormat.'</option>';	
						} else {
							echo '<option value="'.$Hour.'">'.$TwelveHourFormat.'</option>';
						}
					}
					
				echo '</select>
			</th>
			<th>
				<input type="text" name="id" placeholder="ID" value="'.$SearchID.'" class="reviewsearch">
			</th>
		</tr>
		<tr>
			<td class="searchoptions"></td>
			<td class="searchoptions"></td>
			<td class="searchoptions">
				<input type="submit" name="submit" value="Search">
			</td>
		</tr>';

		//require 'php/mysqlconnect.php';

		$mysql_hostname = "localhost";
		$mysql_user     = "custard_admin";
		$mysql_password = "apache";
		$mysql_database = "custard";
		$bd             = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
		
		mysql_select_db($mysql_database, $bd) or die("Oops something went wrong");// we are now connected to database

		$result = mysql_query("SELECT * FROM csat WHERE score LIKE '%$SearchScore%' AND date LIKE '$SearchDateTime' AND id LIKE '%$SearchID%'"); // selecting data through mysql_query()

		while($data = mysql_fetch_array($result))
		{
			// we are running a while loop to print all the rows in a table
			$FormattedDateMonth = substr($data['date'], 4, 2);
			$FormattedDateDay = substr($data['date'], 6, 2);
			$FormattedDateYear = substr($data['date'], 0, 4);
			$FormattedDateHour = substr($data['date'], 8, 2);
				if ($FormattedDateHour > 12) {
					$FormattedDateHour = $FormattedDateHour - 12;
					$SearchResultAMorPM = "PM";
					if ($FormattedDateHour < 10) {
						$FormattedDateHour = "0$FormattedDateHour";
					}
				} else {
					$SearchResultAMorPM = "AM";
				}
			$FormattedDateMinute = substr($data['date'], 10, 2);
			$FormattedDateSecond = substr($data['date'], 12, 2);
			
			if ($data['score'] == 0) {
				$Smiley = '&nbsp;&nbsp;<div style="display: inline-block; color: black; background-color: #c70000; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:(</div>';
			} elseif ($data['score'] == 1) {
				$Smiley = '&nbsp;&nbsp;<div style="display: inline-block; color: black; background-color: #ffa500; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:|</div>';
			} elseif ($data['score'] == 2) {
				$Smiley = '&nbsp;&nbsp;<div style="display: inline-block; color: black; background-color: green; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:)</div>';
			}
			
			echo'<tr>'; // printing table row
			echo '<td class="scorecolumn">'.$Smiley.'</td>
			<td class="datecolumn">'.$FormattedDateMonth.' / '.$FormattedDateDay.' / '.$FormattedDateYear.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$FormattedDateHour.':'.$FormattedDateMinute.':'.$FormattedDateSecond.'&nbsp;&nbsp;'.$SearchResultAMorPM.'</td>
			<td class="idcolumn">'.$data['id'].'</td>';
			// we are looping all data to be printed till last row in the table
			echo'</tr>'; // closing table row
		}

		echo '</table>';  //closing table tag
?>
