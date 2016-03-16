<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);
?>
<html>
	<title>
		Custard
	</title>

	<head>
		<link rel="stylesheet" type="text/css" href="login.css">
		<script type="text/javascript" language="JavaScript">
				setTimeout(function() {window.location = 'login.php'}, 1000);
		</script>
	</head>

	<body>
		<ul id="topmenu">
			<li>&nbsp&nbsp&nbsp<img src="img/custard.png" width=40px height=40px>&nbsp&nbsp&nbsp</li>
		</ul>

		<div align=center>

<br />
<br />
<br />
<br />
			You have been logged out.
		</div>
	</body>
</html>
