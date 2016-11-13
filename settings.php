<?php
$databaseConnect = mysqli_connect ( "localhost", "user", "password", "database_name" );
$max_filesize = 2097152; //2 MiB
$absoloute_path = $_SERVER['DOCUMENT_ROOT'] . 'Uploads/';
$allowed = array (
				'png',
				'jpg',
				'gif' 
		);
  ?>
