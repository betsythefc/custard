<?php
	require_once('auth.php');
	require "php/mysqlconnect.php";
	require 'php/rights.php';

	//User Theme
		$NewTheme = $_GET['theme'];
	
		$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='theme' AND user='$LoggedInUserName'");
		$sql->execute();
		$themeResult = $sql->fetch();
		$CurrentTheme = "${themeResult[parameter]}";
	
		if ($CurrentTheme !== $NewTheme) {
			$sql = $DBH->prepare("UPDATE settings SET parameter='$NewTheme' WHERE setting='theme' AND user='$LoggedInUserName'");
			$sql->execute();
		}
		
		echo "	<script type=\"text/javascript\" language=\"JavaScript\">
			setTimeout(function() {window.location = 'settings.php?page=personal'}, 0);
             	</script>";
	
?>
