<?php
	require_once('auth.php');
	require 'mysql.php';
	require 'rights.php';
	$setfor = $_GET['setfor'];
	$NewTheme = $_GET['theme'];
	
	$sql = $DBH->prepare("SELECT user,parameter AS theme FROM settings WHERE setting='theme'");
	$sql->execute();
	$themeResult = $sql->fetchAll();
	$ThemeArr = array();
	foreach ($themeResult as $UserTheme) {
		$ThemeArr["{$UserTheme[user]}"] = "{$UserTheme[theme]}";
	}
	
	if ("$setfor" == "user") {
	//User Theme
		$CurrentTheme = "{$ThemeArr["$LoggedInUserName"]}";
	
		if ($CurrentTheme !== $NewTheme) {
			$sql = $DBH->prepare("UPDATE settings SET parameter='$NewTheme' WHERE setting='theme' AND user='$LoggedInUserName'");
			$sql->execute();
		}
		
		header("location: settings.php?section=user&page=general");
	} elseif ("$setfor" == "global" && "${UserType[UserType]}" == "admin") {
	//Global Theme
		$CurrentTheme = "{$ThemeArr["global"]}";
	
		if ($CurrentTheme !== $NewTheme) {
			$sql = $DBH->prepare("UPDATE settings SET parameter='$NewTheme' WHERE setting='theme' AND user=\"global\"");
			$sql->execute();
		}
			
		header("location: settings.php?section=administration&page=general");
	}
?>
