<?php
require 'mysql.php';
session_start();

if(isset($_SESSION['SESS_MEMBER_ID'])) {
	//Theme
	require 'auth.php';
	require 'rights.php';
	
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
	echo "/* Theme: $theme */";
	
	// Require the default theme //
	require "theme/light.php";
	//Any missing elements from the custom theme will be taken from the default theme //
	require "theme/${theme}.php";
	
	$ThemeArr = file("theme/$theme.theme");
	foreach ($ThemeArr as $ThemeVar) {
		preg_match("/^(.*)=/", $ThemeVar, $output_array);
		$ThemeVarSetting = "${output_array[1]}";
		preg_match("/=(.*)$/", $ThemeVar, $output_array);
		$ThemeVarParam = "${output_array[1]}";
		echo "${ThemeVarSetting}: ${ThemeVarParam}";
	}

	echo "body {
		background-color: $PageBackgroundColor;
		color: $PageTextColor;
	}
	
	#topmenu {
		background-color: $TopMenuColor;
	}
	
	#topmenu li a {
		color: $MenuTextColor;
	}
	
	#topmenu li a:hover {
		background-color: $MenuHoverColor;
	}
	
	#settingsmenu {
		background-color: $SettingsMenuColor;
	}
	
	#settingsmenu li a {
		color: $MenuTextColor;
	}
	
	#settingsmenu li a:hover {
		background-color: $MenuHoverColor;
	}
	
	#settingsmenu_admin {
		background-color: $SecondSettingsMenuColor;
	}
	
	#settingsmenu_admin li a {
		color: $MenuTextColor;
	}
	
	#settingsmenu_admin li a:hover {
		background-color: $MenuHoverColor;
	}
	
	.widget #widget {
		background-color: $WidgetBackgroundColor;
	}
	
	.reviews th {
		background-color: $ReviewsPageTableRowColor;
	}
	
	.rowtype0 {
		background-color: $PageBackgroundColor;
	}
			
	.rowtype1 {
		background-color: $ReviewsPageTableRowColor;
	}
	
	.reviewsearch {
		background-color: $TextboxBackgroundColor;
	}
	
	.searchdatetime {
		background-color: $TextboxBackgroundColor;
	}
	
	#search {
		border: 1px solid $SearchButtonBackground;
		background-color: $SearchButtonBackground;
	}
	
	.exporttocsv {
		background-color: $SearchButtonBackground;
	}
	
	.exporttocsv a {
		background-color: $SearchButtonBackground;
	}
	
	.loginform {
		background-color: $WidgetBackgroundColor;
	}
	
	.userrow0 {
		backgroundcolor: $ReviewsPageTableRowColor;
	}
				
	.userrow1 {
		backgroundcolor: $WidgetBackgroundColor;
	}
	
	.theme {
		background-color: $WidgetBackgroundColor;
	}
	
	.integration {
		background-color: $WidgetBackgroundColor;
	}";
} else {
	$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='theme' AND user='global'");
	$sql->execute();
	$themeResult = $sql->fetch();
	$theme = "${themeResult[parameter]}";
	
	require "theme/${theme}.php";
	
echo "	body {
		background-color: $PageBackgroundColor;
		color: $TextColor;
	}
	
	.loginform {
		background-color: $WidgetBackgroundColor;
	}
	#topmenu {
		background-color: $TopMenuColor;
	}
	
	#topmenu li a:hover {
		background-color: $MenuHoverColor;
	}";
}
