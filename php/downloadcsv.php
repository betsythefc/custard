<?php
	$SearchScore = $_GET['score'];
	$SearchStartDate = $_GET['startdate'];
	$SearchEndDate = $_GET['enddate'];
	$SearchID = $_GET['id'];
	
	// output headers so that the file is downloaded rather than displayed
	header('Content-Type: text/csv; charset=utf-8');
	header('Content-Disposition: attachment; filename=data.csv');
	
	// create a file pointer connected to the output stream
	$output = fopen('php://output', 'w');
	
	// output the column headings
	fputcsv($output, array('Score', 'Smiley', 'Date','ID','Comment'));
	
	require 'mysqlconnect.php';
		
					$sql = $DBH->prepare("SELECT * FROM csat WHERE score REGEXP '$SearchScore' AND date >= '$SearchStartDate' AND date <= '$SearchEndDate' AND id LIKE '%$SearchID%'");
					$sql->execute();
					$result = $sql->fetch();
		
					$mysql_hostname = "localhost";
					$mysql_user     = "custard_admin";
					$mysql_password = "apache";
					$mysql_database = "custard";
					$bd             = mysql_connect($mysql_hostname, $mysql_user, $mysql_password) or die("Oops some thing went wrong");
		
					mysql_select_db($mysql_database, $bd) or die("Oops something went wrong");// we are now connected to database

					//$result = mysql_query("SELECT * FROM csat"); // selecting data through mysql_query()
					$result = mysql_query("SELECT * FROM csat WHERE score REGEXP '$SearchScore' AND date >= '$SearchStartDate' AND date <= '$SearchEndDate' AND id LIKE '%$SearchID%'");

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
							$Smiley = ':(';
						} elseif ($data['score'] == 1) {
							$Smiley = ':|';
						} elseif ($data['score'] == 2) {
							$Smiley = ':)';
						}
						$FormattedDate = "$FormattedDateMonth/$FormattedDateDay/$FormattedDateYear $FormattedDateHour:$FormattedDateMinute:$FormattedDateSecond $SearchResultAMorPM";
												
						fputcsv($output, array("${data['score']}", "$Smiley", "$FormattedDate","${data['id']}","${data['comment']}"));
					}
?>
