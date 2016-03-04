<?php
	$theme = file_get_contents('config/theme.cfg');
	echo "<form action=\"setsettings.php\" method=\"get\"><br />
	Theme: <select name=\"theme\">
		<option value=\"light\">Light</option>
		<option value=\"dark\">Dark</option>
	</select>
	<input type=\"submit\" />";
?>
