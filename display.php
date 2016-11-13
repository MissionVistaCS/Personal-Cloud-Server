<?php
    session_start ();
    include_once($_SERVER['DOCUMENT_ROOT'] . "/settings.php");
    if (empty ( $_SESSION ['id'] )) {
        header ( "Location: " . $_SERVER['DOCUMENT_ROOT'] . "/login.php" );
    } else {
        $file = basename(urldecode($_GET['file']));
        if (file_exists($absolute_path . $file)) {
            $contents = file_get_contents($absolute_path . $file);
            header('Content-type: image/jpeg');
            echo $contents;
        }
    }
    ?>