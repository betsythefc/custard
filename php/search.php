<?php
		$SearchScoreNumber = $_GET['score'];
		if ($SearchScoreNumber == 0) {
			$SearchScoreNumber = "";
		} else {
			$SearchScore = $SearchScoreNumber - 1;
		}
		$SearchDateStringOriginal = $_GET['date'];
		$SearchDateString = str_replace("-","",$SearchDateStringOriginal);
		$SearchDateString = str_replace("T","",$SearchDateString);
		$SearchDate = str_replace(":","",$SearchDateString);
		$SearchTimeOriginal = $_GET['time'];
		$SearchTime = "${SearchTimeOriginal}[0-9]{4}$";
		$Hours = array(0, 1, 2, 3, 4, 5, 6, 7, 8, 9, 10, 11, 12, 13, 14, 15, 16, 17, 18, 19, 20, 21, 22, 23)
		$SearchID = $_GET['id'];
		$SearchComment = $_GET['comment'];

		echo '	<form>
				<table id="reviews">
					<tr>
						<th>
							<select name="score" class="scoresearch">';

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
			<th>
				<input type="date" name="date" placeholder="Date" value="'.$SearchDateStringOriginal.'" class="reviewsearch">&nbsp;&nbsp;
				<select name="time">'
					//Put foreachloop here.
				echo '	<option value=""></option>
					<option value="00">12 AM</option>
					<option value="02">2 AM</option>
					<option value="03">3 AM</option>
					<option value="04">4 AM</option>
					<option value="05">5 AM</option>
					<option value="06">6 AM</option>
					<option value="07">7 AM</option>
					<option value="08">8 AM</option>
					<option value="09">9 AM</option>
					<option value="10">10 AM</option>
					<option value="11">11 AM</option>
					<option value="12">12 PM</option>
					<option value="13">1 PM</option>
					<option value="14">2 PM</option>
					<option value="15">3 PM</option>
					<option value="16">4 PM</option>
					<option value="17">5 PM</option>
					<option value="18">6 PM</option>
					<option value="19">7 PM</option>
					<option value="20">8 PM</option>
					<option value="21">9 PM</option>
					<option value="22">10 PM</option>
					<option value="23">11 PM</option>
				</select>
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

		$mysql_hostname = "localhost";
		$mysql_user     = "custard_admin";
		$mysql_password = "apache";
		$mysql_database = "custard";
		$bd             = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
		
		mysql_select_db($mysql_database, $bd) or die("Oops some thing went wrong");// we are now connected to database

		$result = mysql_query("SELECT * FROM csat WHERE score LIKE '%$SearchScore%' AND date REGEXP '$SearchDate$SearchTime' AND id LIKE '%$SearchID%'"); // selecting data through mysql_query()

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
			
			if ($data['score'] == 0) {
				$Smiley = '&nbsp;&nbsp;<div style="display: inline-block; color: black; background-color: #c70000; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:(</div>';
			} elseif ($data['score'] == 1) {
				$Smiley = '&nbsp;&nbsp;<div style="display: inline-block; color: black; background-color: #ffa500; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:|</div>';
			} elseif ($data['score'] == 2) {
				$Smiley = '&nbsp;&nbsp;<div style="display: inline-block; color: black; background-color: green; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:)</div>';
			}
			
			echo'<tr>'; // printing table row
			echo '<td class="scorecolumn">'.$Smiley.'</td>
			<td class="datecolumn">'.$FormattedDateMonth.' / '.$FormattedDateDay.' / '.$FormattedDateYear.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$FormattedDateHour.':'.$FormattedDateMinute.':'.$FormattedDateSecond.'&nbsp;&nbsp;'.$AMorPM.'</td>
			<td class="idcolumn">'.$data['id'].'</td>';
			// we are looping all data to be printed till last row in the table
			echo'</tr>'; // closing table row
		}

		echo '</table>';  //closing table tag
?>
