<?php
	include_once($_SERVER['DOCUMENT_ROOT'] . "/settings.php");
	if (isset ( $_POST ['username'])) {
		$usrname = strip_tags ( $_POST ['username'] );
		$passwd = strip_tags ( $_POST ['password'] );
		$usrname = mysqli_real_escape_string ( $databaseConnect, $usrname );
		$passwd = mysqli_real_escape_string ( $databaseConnect, $passwd );
		$sql = "SELECT id, username, password FROM users WHERE username = '$usrname' LIMIT 1";
		$query = mysqli_query ( $databaseConnect, $sql );
		$row = mysqli_fetch_row ( $query );
		$uid = $row [0];
		$databaseUsername = $row [1];
		$databasePassword = $row [2];
		if ($usrname == $databaseUsername && password_verify ( $passwd, $databasePassword )) {
			session_start ();
			$_SESSION ['username'] = $usrname;
			$_SESSION ['id'] = $uid;
			echo "Success";
		} else {
			echo "Failed";
		}
	}
 	?>