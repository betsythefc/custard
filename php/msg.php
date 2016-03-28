<?php
	$message = $_GET['msg'];
	
	$ErrArr = array(
		array(1,"You have been logged out."),
		array(2,"That username has already been taken."),
		array(3,"The passwords do not match."),
		array(4,"You cannot delete the last user"),
	);
	
	if (!(empty($message))) {
		echo "<br /><br /><span style='color:red;'>";
		foreach ($ErrArr as $Error) {
			if ("$message" == "{$Error[0]}") {
				echo "{$Error[1]}";
			}
		}
		echo "</span>";
	}
?>
