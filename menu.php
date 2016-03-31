<?php
	// Dependencies //
	require 'rights.php';
	require 'mysqlconnect.php';
	
	// Top Menu //
	echo '	<ul id="topmenu">
			<li>&nbsp&nbsp&nbsp<img src="img/custard.png" width=40px height=40px>&nbsp&nbsp&nbsp</li>
			<li><a href="index.php">CSat</a></li>
			<li><a href="reviews.php">Reviews</a></li>';
	if ("${UserType[UserType]}" == "admin") {
		echo '	<li><a href="settings.php?section=admin&page=general">Settings</a></li>';
	} else {
		echo '	<li><a href="settings.php?section=user&page=general">Settings</a></li>';
	}
	
	echo '		<li><a href="login.php?msg=1">Logout</a></li>
		</ul>';
	
	// Secondary Menu //
	if (!(empty($page))) {
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
				<li><a href="settings.php?section=user&page=general" ';
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
					<li><a href="settings.php?section=user&page=general" ';
					if ("$page" == "general") {
						echo "$SecondMenuSelectedStyle";
					}
					echo '>General</a></li>
				</ul>';
			}
		} else {
			echo '<ul id="settingsmenu">
				<li><a href="settings.php?section=user&page=general" ';
					if ("$page" == "general") {
						echo "$SecondMenuSelectedStyle";
					}
					echo '>General</a></li>
			</ul>';
		}
	}
?>
