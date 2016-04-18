<?php
	// CSS
	$CSSDependencies = array(
		"All" 		=> 	array("stylereset.css","general_css.php","theme_css.php","topmenu.css"),
		"Reviews" 	=>	array("search.css"),
		"Settings"	=>	array("settingsmenu.css","settings.css"),
		"Dashboard"	=>	array("widgets.css"),
		"Login"		=>	array("login.css")
	);
	
	echo "\n";
	
	foreach ($CSSDependencies['All'] as $CSSFiles) {
		echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"$CSSFiles\">\n";
	}
	
	foreach ($CSSDependencies["$PageName"] as $CSSFiles) {
		echo "\t\t\t\t<link rel=\"stylesheet\" type=\"text/css\" href=\"$CSSFiles\">\n";
	}
	
	// Icon
	echo "\t\t\t\t<link rel=\"shortcut icon\" type=\"image/png\" href=\"img/icon_custard.png\">\n\t\t";

?>
