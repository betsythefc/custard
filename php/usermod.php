<?php
	require "mysqlconnect.php";
	//require 'rights.php';
	//$CurrentUsername = $_SESSION['SESS_FIRST_NAME'];
	
	if ($_POST['add']) {
		$NewUsername = $_POST['username'];
		$sql = $DBH->prepare("SELECT username FROM member WHERE username=\"$NewUsername\"");
		$sql->execute();
		$currentusername = $sql->fetch();
		if ($NewUsername == "${currentusername[username]}") {
			$msg = "&msg=2";	
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
					$usertype = $_POST['usertype'];
				$sql = $DBH->prepare("INSERT INTO member VALUES(\"$memberid\",\"$NewUsername\",\"$password\",\"$salt\",\"$usertype\")");
				$sql->execute();
			} else {
				if ($msg !== "2") {
					$msg = "&msg=3";
				}
			}
		$sql = $DBH->prepare("INSERT INTO settings VALUES ('$NewUsername','theme','default')");
		$sql->execute();
		}
	} elseif ($_POST['delete']) {
		$sql = $DBH->prepare("SELECT COUNT(*) as TotalMembers FROM member");
		$sql->execute();
		$result = $sql->fetch();
		if ("{$result[TotalMembers]}" > "1") {
			foreach ($_POST['user'] as $user) {
				$userlist .= "^$user$|";
			}
			$userlist = substr($userlist, 0, -1);
			$sql = $DBH->prepare("DELETE FROM member WHERE username REGEXP \"$userlist\"");
			$sql->execute();
			$sql = $DBH->prepare("DELETE FROM settings WHERE user REGEXP \"$userlist\"");
			$sql->execute();
		} else {
			$msg = "&msg=4";
		}
	} elseif ($_POST['chngpw']) {
		echo "Changing the user password is not yet supported.";
	}
	
	header("location: ../settings.php?section=admin&page=users${msg}");
?>
