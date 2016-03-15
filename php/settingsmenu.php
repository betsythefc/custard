<?php
	require 'php/rights.php';
	if ("${UserType[UserType]}" == "admin") {
		echo '<ul id="settingsmenu">
			<li><a href="settings.php?page=general">General</a></li>
			<li><a href="settings.php?page=users">Users</a></li>
			<li><a href="settings.php?page=integration">Integration</a></li>
			<li><a href="settings.php?page=about">About</a></li>
		</ul>';
	}
?>
