<?php
	require_once('auth.php');
	require "php/mysqlconnect.php";
	
	//Theme
		$NewTheme = $_GET['theme'];
	
		$sql = $DBH->prepare('SELECT parameter FROM settings WHERE setting="theme"');
		$sql->execute();
		$themeResult = $sql->fetch();
		$CurrentTheme = "${themeResult[parameter]}";
	
		if ($CurrentTheme !== $NewTheme) {
			$sql = $DBH->prepare("UPDATE settings SET parameter='$NewTheme' WHERE setting='theme'");
			$sql->execute();
		}
	
	//Create new user
		
	
	echo "	<script type=\"text/javascript\" language=\"JavaScript\">
			setTimeout(function() {window.location = 'settings.php?page=general'}, 0);
             	</script>";
?>
