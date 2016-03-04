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
			?>

		<div>
		<br />
		<br />
		<br />
		<br />
			<?php
				require 'php/search.php';
			?>
		</div>
		<?php 
			require 'php/footer.php';
		?>
	</body>	
</html>

