<?php
	$CSSFile = "css_general.php";
	
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
	
	$Icon = "img/custard_favicon.png";
	echo "		\t\t<link rel=\"shortcut icon\" type=\"image/png\" href=\"$Icon\">
			\t<link rel=\"icon\" type=\"image/png\" href=\"$Icon\">\n\t\t";
?>
