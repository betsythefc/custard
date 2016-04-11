<?php
	$CSSFile = "css_general.php";
	
	// Find all files with the prefix "css_" and add to the header as a stylesheet //
	$CSSArr = array();
	if ($handle = opendir('theme/../')) {
		echo "\n";
		while (false !== ($entry = readdir($handle))) {
			if ("$entry" !== "." and  "$entry" !== ".." and strpos($entry, 'css_') !== false) {
				$CSSArr[] = "${entry}";
			}
		}
		closedir($handle);
	}
	
	foreach ($CSSArr as $CSSFiles) {
		echo "\t\t\t\t<link rel=\"stylesheet\" type\"text/css\" href=\"$CSSFiles\">\n";
	}
	echo "\t\t\t\t<link rel=\"shortcut icon\" type=\"image/png\" href=\"img/icon_custard.png\">\n\t\t";

?>
