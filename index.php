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
		
		<!-- Content -->
		<div id="widgets">
			<div id="widgetcontainer">
				<div id="widget">
					<div id="widgettitle">
						Number of reviews<br />
					</div>
					<div id="widgettext">
						<?php
							require 'php/numberofreviews.php';
						?>
					</div>
				</div>
			</div>
			<div id="widgetcontainer">
				<div id="widget">
					<div id="widgettitle">
						CSAT Score
					</div>
					<div id="widgettext">
						<?php
							require 'php/csatscore.php';
						?>
						<br />
						<font size=7>%</font>
					</div>
				</div>
			</div>
		</div>
		<?php 
			require 'php/footer.php';
		?>
	</body>
</html>
