<?php
		require 'php/searchvar.php';
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

		<div>
		<br />
		<br />
		<br />
		<br />
		<form>
			<table id="reviews">
				<tr>
					<th>
						<select name="score" class="scoresearch">
							<option value=""></option>
							<option value="0">:(</option>
							<option value="1">:|</option>
							<option value="2">:)</option>
						</select>
					</th>
					<th>
						<input type="date" name="date" placeholder="Date" value="<?php echo $SearchDateString; ?>" class="reviewsearch">&nbsp;&nbsp;
						<input type="time" name="time" placeholder="Time" class="reviewsearch">
					</th>
					<th>
						<input type="text" name="id" placeholder="ID" value="<?php echo $SearchID; ?>" class="reviewsearch">
					</th>
				</tr>
				<tr>
					<td class="searchoptions"></td>
					<td class="searchoptions"></td>
					<td class="searchoptions">
						<input type="submit" name="submit" value="Search">
					</td>
				</tr>
		<?php
			require 'php/reviewstable.php';
		?>
		</div>
		<?php 
			require 'php/footer.php';
		?>
	</body>	
</html>

