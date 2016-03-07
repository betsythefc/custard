<?php
	require "php/mysqlconnect.php";
	
	//Theme
	$sql = $DBH->prepare('SELECT parameter FROM settings WHERE setting="theme"');
	$sql->execute();
	$themeResult = $sql->fetch();
	$CurrentTheme = "${themeResult[parameter]}";
	
	if (strpos($CurrentTheme, 'light') !== false) {

	} elseif (strpos($CurrentTheme, 'dark') !== false) {
		
	}
	
	echo "	<h1>Theme</h1>
		<form action=\"setsettings.php\" method=\"get\"><br />
			Theme: <select name=\"theme\">
				<option value=\"light\" ";
				if (strpos($CurrentTheme, 'light') !== false) {
					echo "selected";
				}
				echo ">Light</option>
				<option value=\"dark\" ";
				if (strpos($CurrentTheme, 'dark') !== false) {
					echo "selected";	
				}
				echo ">Dark</option>
			</select>
			<br />
			<br /><input type=\"submit\" value=\"Save\"/><br />
		</form><br />
		<br />";
	
	//New User
	echo "	<h1>Add User</h1>
		<form action=\"php/adduser.php\" method=\"post\">
			Username: <input type=\"text\" name=\"username\" /><br />
			Password: <input type=\"password\"name=\"password\" /><br />
			Repeat Password: <input type=\"password\" name=\"password_verify\" /><br />
			<input type=\"submit\" value=\"Add\">
		</form>";
?>
