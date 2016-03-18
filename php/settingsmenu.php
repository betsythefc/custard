<?php
	require 'php/rights.php';
	require 'php/mysqlconnect.php';
	
	// Get current theme
	$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='theme' AND user='$LoggedInUserName'");
	$sql->execute();
	$themeResult = $sql->fetch();
	$theme = "${themeResult[parameter]}";
	if ("$theme" == "default") {
		$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='theme' AND user='global'");
		$sql->execute();
		$themeResult = $sql->fetch();
		$theme = "${themeResult[parameter]}";
	}
	
	require "theme/$theme.php";
	
	$FirstMenuSelectedStyle = "style=\"background-color: $SecondSettingsMenuColor; color: black;\"";
	$SecondMenuSelectedStyle = "style=\"background-color: $PageBackgroundColor; color: black;\"";
	
	$section = $_GET['section'];
	if ("${UserType[UserType]}" == "admin") {
		echo '<ul id="settingsmenu">
			<li><a href="settings.php?section=admin&page=general" ';
				if ("$section" == "admin") {
					echo "$FirstMenuSelectedStyle";
				}
			echo '>Administration</a></li>
			<li><a href="settings.php?section=user&page=personal" ';
				if ("$section" == "user") {
					echo "$FirstMenuSelectedStyle";
				}
			echo '>User</a></li>
		</ul>';
		if ("$section" == "admin") {
			echo '<ul id="settingsmenu_admin">
				<li><a href="settings.php?section=admin&page=general" ';
				if ("$page" == "general") {
					echo "$SecondMenuSelectedStyle";
				}
				echo '>General</a></li>
				<li><a href="settings.php?section=admin&page=users" ';
				if ("$page" == "users") {
					echo "$SecondMenuSelectedStyle";
				}
				echo '>Users</a></li>
				<li><a href="settings.php?section=admin&page=integration" ';
				if ("$page" == "integration") {
					echo "$SecondMenuSelectedStyle";
				}
				echo '>Integration</a></li>
				<li><a href="settings.php?section=admin&page=about" ';
				if ("$page" == "about") {
					echo "$SecondMenuSelectedStyle";
				}
				echo '>About</a></li>
			</ul>';
		} elseif ("$section" == "user" ) {
			echo '<ul id="settingsmenu_admin">
				<li><a href="settings.php?section=user&page=personal" ';
				if ("$page" == "personal") {
					echo "$SecondMenuSelectedStyle";
				}
				echo '>Personal</a></li>
			</ul>';
		}
	} else {
		echo '<ul id="settingsmenu">
			<li><a href="settings.php?section=user&page=personal" ';
				if ("$page" == "personal") {
					echo "$SecondMenuSelectedStyle";
				}
				echo '>Personal</a></li>
		</ul>';
	}
?>
