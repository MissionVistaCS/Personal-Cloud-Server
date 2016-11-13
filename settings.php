<?php
$databaseConnect = mysqli_connect ( "localhost", "root", "", "personal-cloud" );
$max_filesize = 2097152; //2 MiB
$absolute_path = $_SERVER['DOCUMENT_ROOT'] . '/Uploads/';
$allowed = array (
				'png',
				'jpg',
				'gif',
				'jpeg'
		);
  ?>
