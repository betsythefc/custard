<?php
	require 'php/rights.php';
	$section = $_GET['section'];
	if ("${UserType[UserType]}" == "admin") {
		echo '<ul id="settingsmenu">
			<li><a href="settings.php?section=admin&page=general" ';
				if ("$section" == "admin") {
					echo 'style="background-color: #777;"';
				}
			echo '>Administration</a></li>
			<li><a href="settings.php?section=user&page=personal" ';
				if ("$section" == "user") {
					echo 'style="background-color: #777;"';
				}
			echo '>User</a></li>
		</ul>';
		if ("$section" == "admin") {
			echo '<ul id="settingsmenu_admin">
				<li><a href="settings.php?section=admin&page=general" ';
				if ("$page" == "general") {
					echo 'style="background-color: #e2b816;"';
				}
				echo '>General</a></li>
				<li><a href="settings.php?section=admin&page=users" ';
				if ("$page" == "users") {
					echo 'style="background-color: #e2b816;"';
				}
				echo '>Users</a></li>
				<li><a href="settings.php?section=admin&page=integration" ';
				if ("$page" == "integration") {
					echo 'style="background-color: #e2b816;"';
				}
				echo '>Integration</a></li>
				<li><a href="settings.php?section=admin&page=about" ';
				if ("$page" == "about") {
					echo 'style="background-color: #e2b816;"';
				}
				echo '>About</a></li>
			</ul>';
		} elseif ("$section" == "user" ) {
			echo '<ul id="settingsmenu_admin">
				<li><a href="settings.php?section=user&page=personal" ';
				if ("$page" == "personal") {
					echo 'style="background-color: #e2b816;"';
				}
				echo '>Personal</a></li>
			</ul>';
		}
	} else {
		echo '<ul id="settingsmenu">
			<li><a href="settings.php?section=user&page=personal" ';
				if ("$page" == "personal") {
					echo 'style="background-color: #e2b816;"';
				}
				echo '>Personal</a></li>
		</ul>';
	}
?>
