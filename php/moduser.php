<?php
	$mode = $_GET['mode'];
	require "mysqlconnect.php";
	
	if ($mode == "add") {
		$username = $_POST['username'];
		$sql = $DBH->prepare("SELECT username FROM member WHERE username=\"$username\"");
		$sql->execute();
		$currentusername = $sql->fetch();
		if ($username == "${currentusername[username]}") {
			$error = "&error=1";	
		} else {
			$password = $_POST['password'];
			$password_verify = $_POST['password_verify'];
			function rand_string( $length ) {
				$chars = "abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789";
				$size = strlen( $chars );
				for( $i = 0; $i < $length; $i++ ) {
					$str .= $chars[ rand( 0, $size - 1 ) ];
				}
				return $str;
			}
			if ($password == $password_verify) {
				//Salt and Hash password
					$salt = rand_string( 60 );
					$password = "${password}${salt}";
					$password = hash('sha256', "$password");
				//Get Member ID
					$MySQL_MemberID = $DBH->prepare('SELECT MAX(mem_id) AS MAXMEMID FROM member');
					$MySQL_MemberID->execute();
					$memberid = $MySQL_MemberID->fetch();
					$memberid = "${memberid[MAXMEMID]}";
					$memberid = $memberid + 1;
				$sql = $DBH->prepare("INSERT INTO member VALUES(\"$memberid\",\"$username\",\"$password\",\"$salt\")");
				$sql->execute();
			} else {
				if ($error !== "1") {
					$error = "&error=2";
				}
			}
		}
	} elseif ($mode == "del") {
		$sql = $DBH->prepare("SELECT COUNT(*) AS 'Count' FROM member");
		$sql->execute();
		$numberofusers = $sql->fetch();
		if ("${numberofusers[Count]}" == 1) {
			$error = "&error=3";
		} else {
			$username = $_POST['username'];
			foreach ($username as $user) {
				$userlist .= "^$user$|";
			}
			$userlist = substr($userlist, 0, -1);
			$sql = $DBH->prepare("DELETE FROM member WHERE username REGEXP \"$userlist\"");
			$sql->execute();
		}
	}
	echo "	<script type=\"text/javascript\" language=\"JavaScript\">
			setTimeout(function() {window.location = '../settings.php?page=users${error}'}, 0);
           	</script>";
?>
