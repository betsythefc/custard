<?php
	//Start session
	session_start();	
	//Unset the variables stored in session
	unset($_SESSION['SESS_MEMBER_ID']);
	unset($_SESSION['SESS_FIRST_NAME']);
	unset($_SESSION['SESS_LAST_NAME']);

	echo '	<html>
			<title>
				Custard
			</title>

			<head>';
				require 'php/header_lo.php';
		echo '	</head>

			<body>
				<ul id="topmenu">
					<li>&nbsp&nbsp&nbsp<img src="img/custard.png" width=40px height=40px>&nbsp&nbsp&nbsp</li>
				</ul>
		
				<div align=center>

			<br />
			<br />
			<br />
			<br />
				<form name="loginform" action="login_exec.php" method="post">
					<div class="loginform">
						Custard Login
						<div class="loginform_container">
							<div class="loginform_text">Username</div>
							<div class="loginform_username"><input class="input" name="username" type="text" /></div>
							<div class="loginform_text">Password</div>
							<div class="loginform_password"><input class="input" name="password" type="password" /></div>
						</div>
						<div>
							<input id="loginform_submit" name="" type="submit" value="login" />
						</div>
					</div>
					<div>
						<div>';
								if( isset($_SESSION['ERRMSG_ARR']) && is_array($_SESSION['ERRMSG_ARR']) && count($_SESSION['ERRMSG_ARR']) >0 ) {
									echo '<ul class="err">';
									foreach($_SESSION['ERRMSG_ARR'] as $msg) {
										echo '<li>',$msg,'</li>'; 
									}
									echo '</ul>';
									unset($_SESSION['ERRMSG_ARR']);
								}
							echo '	</div>
							</div>
					</form>
				</div>
			</body>
		</html>';
?>
