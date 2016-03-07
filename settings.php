<?php
	require_once('auth.php');
?>
<html>

	<title>
		Custard
	</title>
	
	<head>
		<?php require 'php/css.php'; ?>
		<link rel="icon" type="image/png" href="img/custard_favicon.png">
	</head>
	
	<body>
	
		<!-- Top Menu -->
			<?php
				require 'php/topmenu.php';
			?>
		
		<div>
			<br />
			<br />
			<br />
			<br />
			<div align="center">
			<?php
				require 'php/getsettings.php';
			?>
			</div>

		</div>
	</body>	
</html>
