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
<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="CSS/main.css" />
<link rel="stylesheet" href="CSS/forum.css" />
<link rel="stylesheet" href="CSS/menu.css" />
<meta charset="utf-8">
<title>Gallery</title>
</head>
<body>
    <header>
        <h1>
            <i>Personal Cloud Gallery</i>
        </h1>
        <nav id="menu">
            <ul>
                <li><a href="./gallery.php?id=1" target="_top"><p>Gallery</p></a></li>
                <li><a href="./logout.php" target="_top" style="padding-right: 30px"><p>Logout</p></a></li>
            </ul>
        </nav>
    </header>
    <div id="main">
        <div id="pagewrap" style="text-align: center;">
                        <tr align='center'>
                            <?php
                            echo "
                            <img src="$absolute_path . $file . "' style='max-width: 90%; padding: 15px;'/>
                            ";
                        </tr>
            <!--<div style='text-align: center; padding-top: 5px; padding-bottom: 10px;'>
                <a href='edtimage.php?id=" . $file . "'>Click here</a> to edit information about this image.
            </div>-->
            ?>
        </div>
    </div>
</body>
</html>