<?php
	// Dependencies //
	require 'rights.php';
	require 'mysql.php';
	
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
			$FirstMenuArr = array('administration','user');
			echo '<ul id="settingsmenu">';
			foreach($FirstMenuArr as $FirstMenuTab) {
				echo "	<li><a href=\"settings.php?section={$FirstMenuTab}&page=general\" ";
					if ("$section" == "$FirstMenuTab") {
						echo "$FirstMenuSelectedStyle";
					}
				echo '>'.ucfirst("$FirstMenuTab").'</a></li>';
			}
			echo '</ul>';
			if ("$section" == "administration") {
				$AdminMenuArr = array('general','users','integration','about');
				echo '	<ul id="settingsmenu_admin">';
				foreach ($AdminMenuArr as $AdminMenuTab) {
					echo "<li><a href=\"settings.php?section=administration&page={$AdminMenuTab}\" ";
					if ("$page" == "$AdminMenuTab") {
						echo "$SecondMenuSelectedStyle";
					}
					echo '>'.ucfirst("$AdminMenuTab").'</a></li>';
				}
				echo '</ul>';
			} elseif ("$section" == "user" ) {
				$UserMenuArr = array('general');
				echo '	<ul id="settingsmenu_admin">';
				foreach ($UserMenuArr as $UserMenuTab) {
					echo "<li><a href=\"settings.php?section=user&page={$UserMenuTab}\" ";
					if ("$page" == "$UserMenuTab") {
						echo "$SecondMenuSelectedStyle";
					}
					echo '>'.ucfirst("$UserMenuTab").'</a></li>';
				}
				echo '</ul>';
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
