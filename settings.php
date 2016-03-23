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
		
		<script type="text/javascript">
			checked=false;
			function checkedAll (userlist) {var aa= document.getElementById('userlist'); if (checked == false)
			{
				checked = true
			}
			else
			{
				checked = false
			}for (var i =0; i < aa.elements.length; i++){ aa.elements[i].checked = checked;}
			}
		</script>
	</head>
	
	<body>
	
		<!-- Top Menu -->
			<?php
				require 'php/topmenu.php';
				require 'php/settingsmenu.php';
			?>
			<br />
			<br />
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
					require 'php/rights.php';
					if ("${UserType[UserType]}" == "admin") {
						if ($page == "general") {
						// General Settings
							// Theme
							$sql = $DBH->prepare('SELECT parameter FROM settings WHERE setting="theme" AND user="global"');
							$sql->execute();
							$themeResult = $sql->fetch();
							$CurrentTheme = "${themeResult[parameter]}";
			
							if (strpos($CurrentTheme, 'light') !== false) {
			
							} elseif (strpos($CurrentTheme, 'dark') !== false) {
				
							}
			
							echo '	<div id="theme_container">
									<div id="theme">
										<h2>Global Theme</h2>
										<form action="setglobaltheme.php" method="get"><br />
											<div class="themetext">Theme: </div><select name="theme">';
											if ($handle = opendir('theme')) {
												while (false !== ($entry = readdir($handle))) {
													if ("$entry" !== "." and  "$entry" !== "..") {
														preg_match("/^(.*)\.php$/", $entry, $output_array);
														require "theme/${entry}";
														echo "<option value=\"${output_array[1]}\" ";
														if (strpos($CurrentTheme, "${output_array[1]}") !== false) {
															echo "selected";
														}
														echo ">$ThemeName</option>";
													}
												}

												closedir($handle);
												}
											echo '</select>
											<br />
											<br /><input type="submit" value="Save"/><br />
										</form><br />
										<br />
									</div>
								</div>';
						} elseif ($page == "users") {
						// User Management
							// User List 2.0
							$sql = $DBH->prepare('SELECT username,user_type FROM member');
							$sql->execute();
							$userArr = $sql->fetchAll();
							echo "	<form action=\"php/usermod.php\" method=\"post\" id=\"userlist\">
											<table width=\"80%\" class=\"usertable\">
												<tr class=\"rowtype1\">
													<td width=\"25%\" style=\"font-weight:bold;\"><input type=\"checkbox\" name='checkall' onclick='checkedAll(userlist);'>Select / Clear All</td>
													<td width=\"15%\" style=\"font-weight:bold;\">User</td>
													<td width=\"35%\"></td>
													<td width=\"25%\" style=\"font-weight:bold;\">User Type</td>
												</tr>";
											$RowType = 0;
											$iterate = 0;	
											foreach ($userArr as $user) {
												echo "	<tr class=\"rowtype$RowType\">
														<td><input type=\"checkbox\" name=\"user[${iterate}]\" value=\"${user["username"]}\"></td>
														<td>${user["username"]}</td>
														<td></td>
														<td>${user["user_type"]}</td>
													</tr>";
												$iterate = $iterate + 1;
												if ("$RowType" == "0") {
													$RowType = 1;
												} elseif ("$RowType" == "1") {
													$RowType = 0;
												}
											}
										echo "	<tr class=\"rowtype$RowType\">
												<td>New User</td>
												<td><input type=\"textbox\" name=\"username\" placeholder=\"Username\"/></td>
												<td>&nbsp<input type=\"password\" name=\"password\" placeholder=\"password\" />&nbsp<input type=\"password\" name=\"password_verify\" placeholder=\"password\"/></td>
												<td><select name=\"usertype\">
													<option value=\"user\">User</option>
													<option value=\"admin\">Administrator</option>
												</select>&nbsp<input type=\"submit\" value=\"Add\" name=\"add\"></td>
											
											</table><br />
											
											<input type=\"button\" name=\"answer\" value=\"Remove User(s)\" onclick=\"showDiv()\" /><!-- &nbsp<input type=\"submit\" value=\"Change Password\" name=\"chngpw\" /> -->";
											if ($error == 3) {
												echo "<br /><span style=\"color:red;\">You cannot delete the last user.</span>";
											}
										echo "	<div style=\"display:none;\" id=\"hiddensubmit\"><br /><span style=\"color:red;\">WARNING: You are about to delete users. This action is not reversible. Are you sure you want to do this?</span><br /><input type=\"submit\" value=\"Yes\" name=\"delete\" /><br /></div>
										<br /></div>
										</form>";					
						} elseif ($page == "integration") {
							echo '	<div id="integration_container">
									<div id="integration">
										<h2>Ticket Integration</h2>
										<form action="php/ticketintegration.php" method="post">
											<div class="integrationtext">Database Type: </div><select name="dbtype">
												<option value="disabled">Disabled</option>
												<option value="mysql" ';
													$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='integration'");
													$sql->execute();
													$result = $sql->fetch();
													if ("${result[parameter]}" == "mysql") {
														echo "selected";
													}
												echo '>MySQL</option>
											</select><br />
											<div class="integrationtext">Database Host: </div><input name="dbhost" type="text" ';
													$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='integration_db_host'");
													$sql->execute();
													$result = $sql->fetch();
													if ("${result[parameter]}" !== "NULL" ) {
														echo "value=\"${result[parameter]}\"";
													}
											echo '><br />
											<div class="integrationtext">Database: </div><input name="dbname" type="text" ';
													$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='integration_db'");
													$sql->execute();
													$result = $sql->fetch();
													if ("${result[parameter]}" !== "NULL" ) {
														echo "value=\"${result[parameter]}\"";
													}
											echo '><br />
											<div class="integrationtext">Username: </div><input name="dbusername" type="text" ';
													$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='integration_db_user'");
												$sql->execute();
													$result = $sql->fetch();
													if ("${result[parameter]}" !== "NULL" ) {
														echo "value=\"${result[parameter]}\"";
													}
											echo '><br />
											<div class="integrationtext">Password: </div><input name="dbpw" type="password" ';	
													$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='integration_db_pw'");	
													$sql->execute();
													$result = $sql->fetch();
													if ("${result[parameter]}" !== "NULL" ) {
														echo "value=\"123456\"";
													}
											echo '><br />
											<div class="integrationtext">Verify Password: </div><input name="dbpw_verify" type="password" ';	
													$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='integration_db_pw'");	
													$sql->execute();
													$result = $sql->fetch();
													if ("${result[parameter]}" !== "NULL" ) {
														echo "value=\"123456\"";
													}
											echo '><br />
											<div class="integrationtext">Query: </div><input name="dbquery" type="text" ';	
													$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting='integration_ticketquery'");	
													$sql->execute();
													$result = $sql->fetch();
													if ("${result[parameter]}" !== "NULL" ) {
														echo "value=\"${result[parameter]}\"";
													}
											echo '><br />
											<input type="submit" value="Save">
										</form>
									</div>
								</div>';//<br />
								//<div id="integration_container">
								//	<div id="integration">
								//		<h2>Login Integration</h2>
								//		Coming soon.
								//	</div>
								//</div>';
						} elseif ($page == "about") {
							echo '	<div align=center class="license">
								<img src="img/custard.png" width=250px height=250px><br />
								Custard<br />
								v1.2<br />
								<br />
								Copyright 2015 - ';
								$Year = date('Y'); echo "$Year";
								echo ' Bryce McNab<br />
								<br />
								Licensed under the Apache License, Version 2.0 (the "License");<br />
								you may not use this file except in compliance with the License.<br />
								You may obtain a copy of the License at<br />
								<br />
								http://www.apache.org/licenses/LICENSE-2.0<br />
								<br />
								Unless required by applicable law or agreed to in writing, software<br />
								distributed under the License is distributed on an "AS IS" BASIS,<br />
								WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.<br />
								See the License for the specific language governing permissions and<br />
								limitations under the License.<br />
								</div>';
						} elseif ($page == "personal") {
							// Theme
							$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting=\"theme\" AND user='${LoggedInUserName}'");
							$sql->execute();
							$themeResult = $sql->fetch();
							$CurrentTheme = "${themeResult[parameter]}";
			
							if (strpos($CurrentTheme, 'light') !== false) {
			
							} elseif (strpos($CurrentTheme, 'dark') !== false) {
				
							}
			
							echo '	<div id="theme_container">
									<div id="theme">

										<h2>User Theme</h2>
										<form action="setusertheme.php" method="get"><br />
											<div class="themetext">Theme: </div><select name="theme">
												<option value="default">Default</option>';
												if ($handle = opendir('theme')) {
												

												/* This is the correct way to loop over the directory. */
												while (false !== ($entry = readdir($handle))) {
													if ("$entry" !== "." and  "$entry" !== "..") {
														preg_match("/^(.*)\.php$/", $entry, $output_array);
														require "theme/${entry}";
														echo "<option value=\"${output_array[1]}\" ";
														if (strpos($CurrentTheme, "${output_array[1]}") !== false) {
															echo "selected";
														}
														echo ">$ThemeName</option>";
													}
												}

												closedir($handle);
												}
											echo '</select>
											<br />
											<br /><input type="submit" value="Save"/><br />
										</form><br />
										<br />
									</div>
								</div>';
						} elseif ($page == "status") {
							// Checking internet connection
								$host = 'www.google.com'; 
								$port = 80; 
								$waitTimeoutInSeconds = 1; 
								if($fp = fsockopen($host,$port,$errCode,$errStr,$waitTimeoutInSeconds)){   
									echo "Internet: <span style=\"color:green;\">Up</span><br />";
								} else {
									echo "Internet: <span style=\"color:red;\">Down</span><br />";
								} 
								fclose($fp);
							// Checking integration servers
								// http://stackoverflow.com/questions/6263443/pdo-connection-test
						}
					} else {
						// Personal Settings
						if ($page == "personal") {
							// Theme
							$sql = $DBH->prepare("SELECT parameter FROM settings WHERE setting=\"theme\" AND user='${LoggedInUserName}'");
							$sql->execute();
							$themeResult = $sql->fetch();
							$CurrentTheme = "${themeResult[parameter]}";
			
							if (strpos($CurrentTheme, 'light') !== false) {
			
							} elseif (strpos($CurrentTheme, 'dark') !== false) {
				
							}
			
							echo '	<div id="theme_container">
									<div id="theme">

										<h2>User Theme</h2>
										<form action="setusertheme.php" method="get"><br />
											<div class="themetext">Theme: </div><select name="theme">
												<option value="default">Default</option>';
												if ($handle = opendir('theme')) {
												

												/* This is the correct way to loop over the directory. */
												while (false !== ($entry = readdir($handle))) {
													if ("$entry" !== "." and  "$entry" !== "..") {
														preg_match("/^(.*)\.php$/", $entry, $output_array);
														require "theme/${entry}";
														echo "<option value=\"${output_array[1]}\" ";
														if (strpos($CurrentTheme, "${output_array[1]}") !== false) {
															echo "selected";
														}
														echo ">$ThemeName</option>";
													}
												}

												closedir($handle);
												}
											echo '</select>
											<br />
											<br /><input type="submit" value="Save"/><br />
										</form><br />
										<br />
									</div>
								</div>';
						}
					}
					?>		
			</div>

		</div>
	</body>	
</html>
