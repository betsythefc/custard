<?php
	require_once('auth.php');
	$page = $_GET['page'];
?>
<html>

	<title>
		Custard
	</title>
	
	<head>
		<?php require 'php/css.php'; ?>
		<link rel="icon" type="image/png" href="img/custard_favicon.png">
		<script language="javascript" type="text/javascript">
		function showDiv() {
   			document.getElementById('hiddensubmit').style.display = "block";
		}
		</script>
	</head>
	
	<body>
	
		<!-- Top Menu -->
			<?php
				require 'php/topmenu.php';
			?>
			<ul id="settingsmenu">
				<li><a href="settings.php?page=general">General</a></li>
				<li><a href="settings.php?page=users">Users</a></li>
				<li><a href="settings.php?page=integration">Integration</a></li>
			</ul>
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
			<br />
		<div>
			<div align="center">
				<?php
					require "php/mysqlconnect.php";
					
					// General Settings
					if ($page == "general") {
						// Theme
						$sql = $DBH->prepare('SELECT parameter FROM settings WHERE setting="theme"');
						$sql->execute();
						$themeResult = $sql->fetch();
						$CurrentTheme = "${themeResult[parameter]}";
		
						if (strpos($CurrentTheme, 'light') !== false) {
		
						} elseif (strpos($CurrentTheme, 'dark') !== false) {
			
						}
		
						echo "	<div id=\"theme_container\">
								<div id=\"theme\">
									<h2>Theme</h2>
									<form action=\"setsettings.php\" method=\"get\"><br />
										<div class=\"themetext\">Theme: </div><select name=\"theme\">
											<option value=\"light\" ";
											if (strpos($CurrentTheme, 'light') !== false) {
												echo "selected";
											}
											echo ">Light</option>
											<option value=\"dark\" ";
											if (strpos($CurrentTheme, 'dark') !== false) {
												echo "selected";	
											}
											echo ">Dark</option>
										</select>
										<br />
										<br /><input type=\"submit\" value=\"Save\"/><br />
									</form><br />
									<br />
								</div>
							</div>";
					} elseif ($page == "users") {
					// User Management
						// New User
						echo "	<div id=\"user_container\">
								<div id=\"user\">
									<h2>Add User</h2>
									<form action=\"php/moduser.php?mode=add\" method=\"post\">
										<div class=\"usertext\">Username: </div><input type=\"text\" name=\"username\" /><br />
										<div class=\"usertext\">Password: </div><input type=\"password\"name=\"password\" /><br />
										<div class=\"usertext\">Repeat Password: </div><input type=\"password\" name=\"password_verify\" /><br />
										<input type=\"submit\" value=\"Add\">
									</form>";
									$error = $_GET['error'];
									if ($error == "1") {
										echo "<br /><span style=\"color:red;\">Username is already taken</span>";
									} elseif ($error == "2") {
										echo "<br /><span style=\"color:red;\">Passwords do not match</span>";
									}
							echo "	</div>
							</div><br />";
						// User List
						$sql = $DBH->prepare('SELECT username FROM member');
						$sql->execute();
						$userArr = $sql->fetchAll();
						echo "	<div id=\"user_container\">
								<div id=\"user\">
									<h2>Users</h2>
									<form action=\"php/moduser.php?mode=del\" method=\"post\">
										<select multiple name=\"username[]\">";
										foreach ($userArr as $user) {
											echo "<option>${user["username"]}</option>";
										}
									echo "	</select><br />
										<input type=\"button\" name=\"answer\" value=\"Remove User(s)\" onclick=\"showDiv()\" /><br />";
										if ($error == 3) {
											echo "<br /><span style=\"color:red;\">You cannot delete the last user.</span>";
										}
									echo "	<div style=\"display:none;\" id=\"hiddensubmit\"><br /><span style=\"color:red;\">WARNING: You are about to delete users. This action is not reversible. Are you sure you want to do this?</span><br /><input type=\"submit\" value=\"Yes\" /><br /></div>
									</form>
								</div>
							</div>";						
					} elseif ($page == "integration") {
						echo "	<div id=\"integration_container\">
								<div id=\"integration\">
									<h2>Ticket Integration</h2>
									Coming soon.
								</div>
							</div><br />
							<div id=\"integration_container\">
								<div id=\"integration\">
									<h2>Login Integration</h2>
									Coming soon.
								</div>
							</div>";
					}
					?>		
			</div>

		</div>
	</body>	
</html>
