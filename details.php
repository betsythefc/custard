<?php
	require 'php/mysqlconnect.php';
	require_once('php/auth.php');
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
			<?php
				require 'php/topmenu.php';
			?>
		
		<!-- Content -->
		<br />
		<br />
		<br />
		<br />
		<?php 
			require 'php/reviewdetails.php';
			require 'php/footer.php';
		?>
	</body>
</html>
