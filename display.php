<?php
    session_start ();
    include_once($_SERVER['DOCUMENT_ROOT'] . "/settings.php");
    if (empty ( $_SESSION ['id'] )) {
        header ( "Location: " . $_SERVER['DOCUMENT_ROOT'] . "/login.php" );
    } else {
        $timestamp = basename(urldecode($_GET['timestamp']));
        $query = mysqli_query($databaseConnect, "SELECT path FROM images WHERE timestamp='$timestamp'");
        $row = mysqli_fetch_row($query);
        if (file_exists($row['0'])) {
            $contents = file_get_contents($row['0']);
            header('Content-type: image/jpeg');
            echo $contents;
        }
    }
    ?>