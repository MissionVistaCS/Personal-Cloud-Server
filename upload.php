<?php
session_start();
$success = "";
include_once($_SERVER['DOCUMENT_ROOT'] . "/settings.php");
if (empty ( $_SESSION ['id'] )) {
	header ( "Location: " . $_SERVER['DOCUMENT_ROOT'] . "/login.php" );
} else {
	if (isset ( $_FILES ['file'] )) {
		$file = $_FILES ['file'];
		$file_name = $file ['name'];
		$file_tmp = $file ['tmp_name'];
		$file_size = $file ['size'];
		$file_error = $file ['error'];
		$file_ext = explode ( '.', $file_name );
		$file_ext = strtolower ( end ( $file_ext ) );
		if (in_array ( $file_ext, $allowed ) && $file_error == 0 && $file_size <= $max_filesize) {
			$file_destination = $absolute_path . time() . '.' . $file_ext;
			if (move_uploaded_file ( $file_tmp, $file_destination )) {
				mysqli_query($databaseConnect, "INSERT INTO images (path, name) VALUES ('$file_destination', '$file_name')");
				$query = mysqli_query($databaseConnect, "SELECT timestamp FROM images WHERE path='$file_destination'");
                                $row = mysqli_fetch_row($query);
                                echo $row['0'];
			}
		}
	}
}
 	?>
