<?php
	require_once('auth.php');
	require 'mysqlconnect.php';
	require 'rights.php';
	$setfor = $_GET['setfor'];
	$NewTheme = $_GET['theme'];
	
	if ("$setfor" == "user") {
	//User Theme
		$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='theme' AND user='$LoggedInUserName'");
		$sql->execute();
		$themeResult = $sql->fetch();
		$CurrentTheme = "${themeResult[parameter]}";
	
		if ($CurrentTheme !== $NewTheme) {
			$sql = $DBH->prepare("UPDATE settings SET parameter='$NewTheme' WHERE setting='theme' AND user='$LoggedInUserName'");
			$sql->execute();
		}
		
		//echo '	<script type="text/javascript" language="JavaScript">
		//	setTimeout(function() {window.location = \'settings.php?section=user&page=personal\'}, 0);
		//</script>';
		header("location: settings.php?section=user&page=personal");
	} elseif ("$setfor" == "global") {
		if ("${UserType[UserType]}" == "admin") {
		//Global Theme
			$sql = $DBH->prepare('SELECT parameter FROM settings WHERE setting="theme" AND user="global"');
			$sql->execute();
			$themeResult = $sql->fetch();
			$CurrentTheme = "${themeResult[parameter]}";
		
			if ($CurrentTheme !== $NewTheme) {
				$sql = $DBH->prepare("UPDATE settings SET parameter='$NewTheme' WHERE setting='theme' AND user=\"global\"");
				$sql->execute();
			}
			
			header("location: settings.php?section=admin&page=general");
		}
	}
?>
