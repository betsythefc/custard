<?php
	require 'php/rights.php';
	$section = $_GET['section'];
	if ("${UserType[UserType]}" == "admin") {
		echo '<ul id="settingsmenu">
			<li><a href="settings.php?section=admin&page=general" ';
				if ("$section" == "admin") {
					echo 'style="font-weight:bold;"';
				}
			echo '>Administration</a></li>
			<li><a href="settings.php?section=user&page=personal" ';
				if ("$section" == "user") {
					echo 'style="font-weight:bold;"';
				}
			echo '>User</a></li>
		</ul>';
		if ("$section" == "admin") {
			echo '<ul id="settingsmenu_admin">
				<li><a href="settings.php?section=admin&page=general" ';
				if ("$page" == "general") {
					echo 'style="font-weight:bold;"';
				}
				echo '>General</a></li>
				<li><a href="settings.php?section=admin&page=users" ';
				if ("$page" == "users") {
					echo 'style="font-weight:bold;"';
				}
				echo '>Users</a></li>
				<li><a href="settings.php?section=admin&page=integration" ';
				if ("$page" == "integration") {
					echo 'style="font-weight:bold;"';
				}
				echo '>Integration</a></li>
				<li><a href="settings.php?section=admin&page=about" ';
				if ("$page" == "about") {
					echo 'style="font-weight:bold;"';
				}
				echo '>About</a></li>
			</ul>';
		} elseif ("$section" == "user" ) {
			echo '<ul id="settingsmenu_admin">
				<li><a href="settings.php?section=user&page=personal" ';
				if ("$page" == "personal") {
					echo 'style="font-weight:bold;"';
				}
				echo '>Personal</a></li>
			</ul>';
		}
	} else {
		echo '<ul id="settingsmenu">
			<li><a href="settings.php?section=user&page=personal" ';
				if ("$page" == "personal") {
					echo 'style="font-weight:bold;"';
				}
				echo '>Personal</a></li>
		</ul>';
	}
?>
