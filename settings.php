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
									</form>
								</div>
							</div><br />";
						// User List
						$sql = $DBH->prepare('SELECT username FROM member');
						$sql->execute();
						$userArr = $sql->fetchAll();
						echo "	<div id=\"user_container\">
								<div id=\"user\">
									<h2>User List</h2>
									<form action=\"php/moduser.php?mode=del\" method=\"post\">
										<select multiple name=\"username[]\">";
										foreach ($userArr as $user) {
											echo "<option>${user["username"]}</option>";
										}
									echo "	</select><br />
										<input type=\"submit\" value=\"Remove User\" />
									</form>
								</div>
							</div>";						
					} elseif ($page == "integration") {
						echo "Coming soon.";
					}
					?>		
			</div>

		</div>
	</body>	
</html>
