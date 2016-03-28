<?php
	require_once('auth.php');
	require 'php/mysqlconnect.php';

	echo '	<html>
			<title>
				Custard
			</title>
	
			<head>';
				require 'php/header_li.php';
		echo '	</head>
	
			<body>';
				require 'php/topmenu.php';
		echo '	<div>
			<br />
			<br />
			<br />
			<br />';

				$SearchScoreChecks = $_GET['happysmiley'] + $_GET['neutralsmiley'] + $_GET['sadsmiley'];
				$SearchScoreArr = array(
					array(1,"0","checked","",""),
					array(2,"1","","checked",""),
					array(3,"0|1","checked","checked",""),
					array(4,"2","","","checked"),
					array(5,"0|2","checked","","checked"),
					array(6,"1|2","","checked","checked"),
					array(7,"0|1|2","checked","checked","checked"),
				);
				foreach ($SearchScoreArr as $SearchScoreVar) {
					if ("$SearchScoreChecks" == "{$SearchScoreVar[0]}") {
						$SearchScore = "{$SearchScoreVar[1]}";
						$SadSmileyChecked = "{$SearchScoreVar[2]}";
						$NeutralSmileyChecked = "{$SearchScoreVar[3]}";
						$HappySmileyChecked = "{$SearchScoreVar[4]}";
					}  elseif (empty($SearchScoreChecks)) {
						$SearchScore = "0|1|2";
						$SadSmileyChecked = "";
						$NeutralSmileyChecked = "";
						$HappySmileyChecked = "";
					}
				}
				
				// Format start search date //
				$SearchStartDateOriginal = $_GET['startdate'];
				if (!(empty($SearchStartDateOriginal))) {
					$SearchStartDateString = str_replace("-","",$SearchStartDateOriginal);
					$SearchStartDateString = str_replace("T","",$SearchStartDateString);
					$SearchStartDate = str_replace(":","",$SearchStartDateString);
				} else {
					$SearchStartDate = "19700101000000";
				}
				
				// Format end search date //
				$SearchEndDateOriginal = $_GET['enddate'];
				if (!(empty($SearchEndDateOriginal))) {
					$SearchEndDateString = str_replace("-","",$SearchEndDateOriginal);
					$SearchEndDateString = str_replace("T","",$SearchEndDateString);
					$SearchEndDate = str_replace(":","",$SearchEndDateString);
				} else {
					$Date = date('YmdHis');
					$SearchEndDate = $Date + 10000000000;
				}
				
				$SearchID = $_GET['id'];
				
				$SearchComment = $_GET['comment'];
				$SmileyDivStyleCommon = 'display: inline-block; color: black; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw; background-color: ';
			
					echo '	<form>
							<table id="reviews">
								<tr>
									<th>
										<label>
											<input type="checkbox" value="4" name="happysmiley" '.$HappySmileyChecked.'>
											<div style="'.$SmileyDivStyleCommon.'green">
												:)
											</div>
										</label>
										<label>
											<input type="checkbox" value="2" name="neutralsmiley" '.$NeutralSmileyChecked.'>
											<div style="'.$SmileyDivStyleCommon.'#ffa500">
												:|
											</div>
										</label>
										<label>
											<input type="checkbox" value="1" name="sadsmiley" '.$SadSmileyChecked.'>
											<div style="'.$SmileyDivStyleCommon.'#c70000;">
												:(
											</div>
										</label><br />
										<div id="export_container"><div class="exporttocsv">
										<a href="php/downloadcsv.php?score='.$SearchScore.'&startdate='.$SearchStartDate.'&enddate='.$SearchEndDate.'&id='.$SearchID.'">
											Export
										</a>
										</div>
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
		
					$sql = $DBH->prepare("SELECT * FROM csat WHERE score REGEXP '$SearchScore' AND date >= '$SearchStartDate' AND date <= '$SearchEndDate' AND id LIKE '%$SearchID%'");
					$sql->execute();
					$reviews = $sql->fetchAll();
					
					$RowNumber = "0";
					
					foreach ($reviews as $review) {
						$FormattedDateMonth = substr($review['date'], 4, 2);
						$FormattedDateDay = substr($review['date'], 6, 2);
						$FormattedDateYear = substr($review['date'], 0, 4);
						$FormattedDateHour = substr($review['date'], 8, 2);
							if ($FormattedDateHour > 12) {
								$FormattedDateHour = $FormattedDateHour - 12;
								$SearchResultAMorPM = "PM";
								if ($FormattedDateHour < 10) {
									$FormattedDateHour = "0$FormattedDateHour";
								}
							} else {
								$SearchResultAMorPM = "AM";
							}
						$FormattedDateMinute = substr($review['date'], 10, 2);
						$FormattedDateSecond = substr($review['date'], 12, 2);
						
						// Select Smiley //
							$Smiley = '<div style="display: inline-block; color: black; font-weight: bold; height: 1.75vw; width: 1.75vw; border-radius: 2px; margin-top: 1px; font-size: 1.5vw; background-color: ';
							if ("${review[score]}" == 0) {
								$Smiley .= '#c70000;">:(';
							} elseif ("${review[score]}" == 1) {
								$Smiley .= '#ffa500">:|';
							} elseif ("${review[score]}" == 2) {
								$Smiley .= 'green;">:)';
							}
							$Smiley .= '</div>';
							
					echo "	<tr class=\"rowtype${RowNumber}\">
							<td class=\"scorecolumn\">
								&nbsp;&nbsp;
								<a href=\"details.php?score=${review['score']}&id=${review['id']}\">
									${Smiley}
								</a>
							</td>
							<td class=\"datecolumn\">
								${FormattedDateMonth}&nbsp;/&nbsp;${FormattedDateDay}&nbsp;/&nbsp;${FormattedDateYear}".str_repeat("&nbsp;",7)."${FormattedDateHour}:${FormattedDateMinute}:${FormattedDateSecond}&nbsp;&nbsp;${SearchResultAMorPM}
							</td>
							<td class=\"idcolumn\">
								${review['id']}
							</td>
						</tr>";
						
						if ($RowNumber == "0") {
							$RowNumber = "1";
						} elseif ($RowNumber == "1") {
							$RowNumber = "0";
						}
					}

				echo '	</table>
				</div>';
		require 'php/footer.php';
	echo '	</body>
	</html>';
?>

