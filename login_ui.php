<?php
	include_once( "settings.php");
	$wrongpasswd = "";
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
			header("Location: gallery.php?id=1");
		} else {
			$wrongpasswd = "The password and or username entered was incorrect.";
		}
	}
 	?>
<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Personal Cloud Login</title>
<style>
body {
	background-color: #808080;
}

#main {
	font-family: "Myriad Set Pro", HelveticaNeue-Light, Helvetica, Arial, sans-serif;
	text-align: left;
	margin: 20px auto;
	width: auto;
}

header {
	height: auto;
	width: auto;
	background: #BFBABA;
	color: white;
	padding-top: 10px;
	text-align: center;
	padding-bottom: 5px;
	font-family: "Lucida Console", "Lucida Sans Typewriter", Monaco,
		"Bitstream Vera Sans Mono", monospace;
}

#loginwrap {
	width: 400px;
	float: none;
	height: 150px;
	margin: 100px auto 0px auto;
	position: relative;
	border: 1px solid #000000;
	background-color: #DBD4D4;
	padding: 10px;
}

#form {
	text-align: center;
}

#reset {
	position: absolute;
	bottom: 0;
	right: 0;
	padding: 10px;
}

#contact {
	position: absolute;
	bottom: 0;
	left: 0;
	padding: 10px;
}

@media screen and (max-width: 750px) {
    #loginwrap {
        width: auto;
    }
}
</style>
</head>
<body>
	<header>
		<h1>Personal Cloud Login</h1>
	</header>
	<div id="main">
		<div id="loginwrap" style="height: auto;">
			<span><strong><u>Login</u></strong>
			<form id="form" action="login_ui.php" method="post" enctype="multipart/form-data" target="_top">
				<div style="padding-right: 3px; padding-top: 10px">
					Username: <input type="text" name="username" spellcheck="false" /> <br />
				</div>
				<div style="padding-bottom: 5px">
					Password: <input type="password" name="password" /> <br />
				</div>
				<div style="color: red;">
        			<?php echo $wrongpasswd; ?>
        		</div>
	            <noscript style="color: red">Disabling Javascript may cuase display issues.</noscript>
				<script type="text/javascript">
				     if(document.cookie.indexOf('PHPSESSID') !=-1)
				     document.getElementById('cookie').style.display='';
				     else
				     document.write('<div style="color: red;"> Sorry, but cookies must be enabled.');
				</script>
				<div id="cookie" style="display: none;"></div>
				<div style="padding-top: 5px; padding-bottom: 25px;">
					<input type="submit" value="Login" name="login"/>
				</div>
			</form>
		</div>
	</div>
</body>
</html>