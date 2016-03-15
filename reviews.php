<?php
	require_once('auth.php');
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

		echo '<div>
		<br />
		<br />
		<br />
		<br />';
			
				//Change to a more logical approach
				$SearchScoreChecks = $_GET['happysmiley'] + $_GET['neutralsmiley'] + $_GET['sadsmiley'];
				if ($SearchScoreChecks == 1) {
					$SearchScore = "0";
					$SadSmileyChecked = "checked";
					$NeutralSmileyChecked = "";
					$HappySmileyChecked = "";
				} elseif ($SearchScoreChecks == 2) {
					$SearchScore = "1";
					$SadSmileyChecked = "";
					$NeutralSmileyChecked = "checked";
					$HappySmileyChecked = "";
				} elseif ($SearchScoreChecks == 4) {
					$SearchScore = "2";
					$SadSmileyChecked = "";
					$NeutralSmileyChecked = "";
					$HappySmileyChecked = "checked";
				} elseif ($SearchScoreChecks == 3) {
					$SearchScore = "0|1";
					$SadSmileyChecked = "checked";
					$NeutralSmileyChecked = "checked";
					$HappySmileyChecked = "";
				} elseif ($SearchScoreChecks == 5) {
					$SearchScore = "0|2";
					$SadSmileyChecked = "checked";
					$NeutralSmileyChecked = "";
					$HappySmileyChecked = "checked";
				} elseif ($SearchScoreChecks == 6) {
					$SearchScore = "1|2";
					$SadSmileyChecked = "";
					$NeutralSmileyChecked = "checked";
					$HappySmileyChecked = "checked";
				} elseif ($SearchScoreChecks == 7) {
					$SearchScore = "0|1|2";
					$SadSmileyChecked = "checked";
					$NeutralSmileyChecked = "checked";
					$HappySmileyChecked = "checked";
				} elseif (empty($SearchScoreChecks)) {
					$SearchScore = "0|1|2";
					$SadSmileyChecked = "";
					$NeutralSmileyChecked = "";
					$HappySmileyChecked = "";
				}
					
				$SearchStartDateOriginal = $_GET['startdate'];
				$SearchStartDateString = str_replace("-","",$SearchStartDateOriginal);
				$SearchStartDateString = str_replace("T","",$SearchStartDateString);
				$SearchStartDate = str_replace(":","",$SearchStartDateString);
				if (empty($SearchStartDate)) {
					$SearchStartDate = "19700101000000";
				}
				
				$SearchEndDateOriginal = $_GET['enddate'];
				$SearchEndDateString = str_replace("-","",$SearchEndDateOriginal);
				$SearchEndDateString = str_replace("T","",$SearchEndDateString);
				$SearchEndDate = str_replace(":","",$SearchEndDateString);
				if (empty($SearchEndDate)) {
					$Date = date('YmdHis');
					$SearchEndDate = $Date + 10000000000;
				}
				
				$SearchID = $_GET['id'];
				
				$SearchComment = $_GET['comment'];
			
					echo '	<form>
							<table id="reviews">
								<tr>
									<th>
										<label><input type="checkbox" value="4" name="happysmiley" '.$HappySmileyChecked.'><div style="display: inline-block; color: black; background-color: green; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:)</div></label>
										<label><input type="checkbox" value="2" name="neutralsmiley" '.$NeutralSmileyChecked.'><div style="display: inline-block; color: black; background-color: #ffa500; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:|</div></label>
										<label><input type="checkbox" value="1" name="sadsmiley" '.$SadSmileyChecked.'><div style="display: inline-block; color: black; background-color: #c70000; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:(</div></label><br />
										<div id="export_container"><div class="exporttocsv"><a href="php/downloadcsv.php?score='.$SearchScore.'&startdate='.$SearchStartDate.'&enddate='.$SearchEndDate.'&id='.$SearchID.'">Export</a></div></div>
									</th>
									<th>
										Start:&nbsp;<input type="datetime-local" name="startdate" value="'.$SearchStartDateOriginal.'" class="searchdatetime"><br />
										End:&nbsp;&nbsp;&nbsp;<input type="datetime-local" name="enddate" value="'.$SearchEndDateOriginal.'" class="searchdatetime">

									</th>
									<th>
										<input type="text" name="id" placeholder="ID" value="'.$SearchID.'" class="reviewsearch"><br />
										<input type="submit" name="submit" value="Search" id="search">
									</th>
								</tr>';

					require 'php/mysqlconnect.php';
		
					$sql = $DBH->prepare("SELECT * FROM csat WHERE score REGEXP '$SearchScore' AND date >= '$SearchStartDate' AND date <= '$SearchEndDate' AND id LIKE '%$SearchID%'");
					$sql->execute();
					$result = $sql->fetch();
		
					$mysql_hostname = "localhost";
					$mysql_user     = "custard_admin";
					$mysql_password = "apache";
					$mysql_database = "custard";
					$bd             = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
		
					mysql_select_db($mysql_database, $bd) or die("Oops something went wrong");// we are now connected to database

					$result = mysql_query("SELECT * FROM csat WHERE score REGEXP '$SearchScore' AND date >= '$SearchStartDate' AND date <= '$SearchEndDate' AND id LIKE '%$SearchID%'"); // selecting data through mysql_query()
					
					$RowNumber = "0";
					
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
							$Smiley = '<div style="display: inline-block; color: black; background-color: #c70000; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:(</div>';
						} elseif ($data['score'] == 1) {
							$Smiley = '<div style="display: inline-block; color: black; background-color: #ffa500; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:|</div>';
						} elseif ($data['score'] == 2) {
							$Smiley = '<div style="display: inline-block; color: black; background-color: green; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw;">:)</div>';
						}
						
						
						echo"<tr class=\"rowtype${RowNumber}\">"; // printing table row
						echo '<td class="scorecolumn">&nbsp;&nbsp;<a href="details.php?score='.$data['score'].'&id='.$data['id'].'">'.$Smiley.'</a></td>
						<td class="datecolumn">'.$FormattedDateMonth.' / '.$FormattedDateDay.' / '.$FormattedDateYear.'&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;'.$FormattedDateHour.':'.$FormattedDateMinute.':'.$FormattedDateSecond.'&nbsp;&nbsp;'.$SearchResultAMorPM.'</td>
						<td class="idcolumn">'.$data['id'].'</td>';
						// we are looping all data to be printed till last row in the table
						echo'</tr>'; // closing table row
						
						if ($RowNumber == "0") {
							$RowNumber = "1";
						} elseif ($RowNumber == "1") {
							$RowNumber = "0";
						}
					}

					echo '</table>';  //closing table tag
			?>
		</div>
		<?php 
			require 'php/footer.php';
		?>
	</body>	
</html>

