<?php
    session_start ();
    include_once($_SERVER['DOCUMENT_ROOT'] . "/settings.php");
    if (empty ( $_SESSION ['id'] )) {
        header ( "Location: login.php" );
    } else {
        header ( 'Content-Type: application/json' );
        $uploaded = array ();
        if (isset ( $_FILES ['file'] ['name'] [0] )) {
            $file = $_FILES ['file'];
            $file_name = $file ['name'];
            $file_tmp = $file ['tmp_name'];
            $file_size = $file ['size'];
            $file_error = $file ['error'];
            $file_ext = explode ( '.', implode ( $file_name ) );
            $file_ext = strtolower ( end ( $file_ext ) );
            if (in_array ( $file_ext, $allowed ) && implode ( $file_size ) <= $max_filesize) {
                $file_name_new = uniqid ( '', true ) . '.' . $file_ext;
                $file_destination = $absolute_path . time() . '.' . $file_ext;
                foreach ( $_FILES ['file'] ['name'] as $file_destination => $file_name_new ) {
                    $file_name_new = uniqid ( '', true ) . '.' . $file_ext;
                    $file_destination = $absolute_path . $file_name_new;
                    if (move_uploaded_file ( implode ( $file_tmp ), $file_destination )) {
                        mysqli_query($databaseConnect, "INSERT INTO images (path, name) VALUES ('$file_destination', '$file_name')");
                    }
                }
            }
        }
    }
?>
