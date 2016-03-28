<?php
	require 'php/rights.php';
	if ("${UserType[UserType]}" == "admin") {
		echo '	<ul id="topmenu">
				<li>&nbsp&nbsp&nbsp<img src="img/custard.png" width=40px height=40px>&nbsp&nbsp&nbsp</li>
				<li><a href="index.php">CSat</a></li>
				<li><a href="reviews.php">Reviews</a></li>
				<li><a href="settings.php?section=admin&page=general">Settings</a></li>
				<li><a href="login.php?msg=1">Logout</a></li>
			</ul>';
	} else {
		echo '	<ul id="topmenu">
				<li>&nbsp&nbsp&nbsp<img src="img/custard.png" width=40px height=40px>&nbsp&nbsp&nbsp</li>
				<li><a href="index.php">CSat</a></li>
				<li><a href="reviews.php">Reviews</a></li>
				<li><a href="settings.php?section=user&page=personal">Settings</a></li>
				<li><a href="login.php?msg=1">Logout</a></li>
			</ul>';
	}
?>
