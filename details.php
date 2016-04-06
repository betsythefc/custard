<?php
	require 'mysql.php';
	require_once('auth.php');

	echo '	<html>

			<title>
				Custard
			</title>
			
			<head>';
				require 'header.php';
		echo '	</head>
	
			<body>';
				require 'menu.php';

		echo '	<br />
			<br />
			<br />
			<br />';
			
			//Set Score and smileys
			$Score = $_GET['score'];
			$HappySmiley = '<div style="width: 100px; height: 100px; border-radius: 10px; background-color: #c5c5c5; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: #b6b6b6;">:)</div>';
			$NeutralSmiley = '<div style="width: 100px; height: 100px; border-radius: 10px; background-color: #c5c5c5; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: #b6b6b6;">:|</div>';
			$SadSmiley = '<div style="width: 100px; height: 100px; border-radius: 10px; background-color: #c5c5c5; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: #b6b6b6;">:(</div>';
			if ($Score == 0) {
				$SadSmiley = '<div style="width: 100px; height: 100px; border-radius: 10px; background-color: #c70000; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;\">:(</div>';
			} elseif ($Score == 1) {
				$NeutralSmiley = '<div style="width: 100px; height: 100px; border-radius: 10px; background-color: #ffa500; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;">:|</div>';
			} elseif ($Score == 2) {
				$HappySmiley = '<div style="width: 100px; height: 100px; border-radius: 10px; background-color: green; float: left; margin: 5px; font-size: 4em; line-height: 90px; text-align: center; font-weight: bold; color: black;">:)</div>';
			}
						
			//Get ID
			$ID = $_GET['id'];
			
			$sql = $DBH->prepare("SELECT * FROM csat WHERE id='${ID}'");
			$sql->execute();
			$Comment = $sql->fetch();
			
			echo "	<div style=\"width:100%;\">
				<div style=\"width:330px;margin:auto;\">${HappySmiley}${NeutralSmiley}${SadSmiley}</div>
				<div style=\"width:330px;margin:auto;text-align:center;font-size:2em;font-weight:bold;\">${ID}</div><br />
				<div style=\"width:500px;margin:auto;text-align:center;font-size:1em;font-weight:bold;\">Comment: <span style=\"font-size:1em;font-weight:normal;\">${Comment[comment]}</span></div>
				</div><br />";

			require 'footer.php';
		echo '	</body>
		</html>';
?>

