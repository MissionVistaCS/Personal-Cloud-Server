<?php
session_start ();
if (isset ( $_SESSION ['username'] )) {
	session_destroy ();
	$msg = "<h2>You have been logged out.</h2>";
	header ( "Location: ./login_ui.php" );
} else {
	$msg = "<h2>There was a problem while logging out.</h2>";
	header ( "Location: ./login_ui.php" );
}
?>
<!DOCTYPE html>
<html lang=en>
<body>
    <?php echo $msg; ?><br>
	<p>
		<a href="./login_ui.php">Click here</a> to return to home if you are not
		redirected.
	</p>
</body>
</html>