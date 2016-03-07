<?php
	require "mysqlconnect.php";
	$username = $_POST['username'];
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
		//Hash username
			$username = hash('sha256', "$username");
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
	}
	
	echo "	<script type=\"text/javascript\" language=\"JavaScript\">
			setTimeout(function() {window.location = 'settings.php'}, 0);
             	</script>";
?>
