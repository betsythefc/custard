<?php
	error_reporting(E_ERROR);
	$CurrentTheme = file_get_contents('config/theme.cfg');
	echo "Current Theme: $CurrentTheme<br />";
	
	$theme = $_GET['theme'];
	echo "Select Theme: $theme<br />";
	
	$themefile = "config/theme.cfg";
	$fh = fopen($themefile, 'w');
	fwrite($fh, $theme);
	fclose($fh);
	$theme = file_get_contents('config/theme.cfg');
	echo "New Theme: $theme<br />";
	
?>
