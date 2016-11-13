<?php
session_start();
include_once( "settings.php");
if (empty ( $_SESSION ['id'] )) {
header ( "Location: " .  "login.php" );
} else {
echo '
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1">
<title>Gallery</title>
</head>
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
		font-family: Arial;
	}

	a {
		color: #008B8B;
		text-decoration: none;
	}

	a:hover {
		text-decoration: none;
	}

	table {
		border-collapse: collapse;
	}

	table, th, td {
		border: 1px solid black;
	}

	td, th {
		padding: 5px;
	}

	form {
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

	#pagewrap {
	    width: 1000px;
	    float: none;
	    height: auto;
	    margin: 15px auto 0px auto;
	    position: relative;
	    border: 1px solid #000000;
	    background-color: #DBD4D4;
	    padding: 10px;
	}

	@media screen and (max-width: 750px) {
	    #pagewrap {
	        width: auto;
	    }
	    #forumwrap {
	        width: auto;
	        height: auto;
	    }
	    #tableheaders {
	        display: none;
	    }
	    #nameheader {
	        text-align: left;
	    }
	    #mintext tr, td {
	        border: solid transparent;
	    }
	    #textarea {
	        width: auto;
	    }
	}

	@media screen and (min-width: 750px) {
	    #mintext {
	        display: none;
	    }
	}

	#table td {
		padding-left: 10px
	}
</style>
<body>
	<header>
		<h1>Gallery</h1>
	</header>
	<div id="main">
		<div id="pagewrap" style="text-align: center;">
			<p>
				<b>Click image to enlarge.</b>
			</p>
			<table>';
	$DisplayImgs = $_REQUEST['id'] * 10;
	$Directory = "Uploads/";
	$FileExt = "*.*";
	$Files = glob ( $Directory . $FileExt );
	$VideoExt = array ('mp4', 'webm', 'ogg');
	for($i = $DisplayImgs-9; $i < $DisplayImgs; $i ++) {
<<<<<<< HEAD
		if(isset($Files[$i])) {
			$FileExtTest = $Files[$i];
			$FileExtTest = explode('.', $FileExtTest);
			$FileExtTest = strtolower(end($FileExtTest));
		if (in_array($FileExtTest, $VideoExt)) {
		     echo '
		        <tr align="center">
			       	<video src="' . $Files [$i] . '" controls="true" style="width:250px; height: inherit; padding: 15px;">
			  	</tr>';
			} else {
			     echo '
	                   	<tr align="center">
	                        <a class="crop_image" name="' . $i . '" href="' . $Files [$i] . '" target="_top"><img src="' . $Files [$i] . '" style="width: 250px; height: inherit; padding: 15px;"></a>
				  		</tr>';
			}
		}
=======
	$FileExtTest = $Files[$i];
	$FileExtTest = explode('.', $FileExtTest);
	$FileExtTest = strtolower(end($FileExtTest));
	if (in_array($FileExtTest, $VideoExt)) {
	     echo '
	          <tr align="center">
		       <video src="' . $Files [$i] . '" controls="true" style="width:250px; height: inherit; padding: 15px;">
		  </tr>';
		} elseif (isset($Files [$i])) {
		     echo '
                          <tr align="center">
                               <a class="crop_image" name="' . $i . '" href="' . $Files [$i] . '" target="_top"><img src="' . $Files [$i] . '" style="width: 250px; height: inherit; padding: 15px;"></a>
			  </tr>';
		} else { echo ''; }
>>>>>>> ade5b10b99ad264bc7a6d74f3926ec5853339482
	}
	$uid_p = $_REQUEST['id']-1;
	$uid_n = $_REQUEST['id']+1;
	echo '
            </table>
                <div style="text-align: center; padding-top: 5px; padding-bottom: 10px;">';
		                if($uid_p >= 1) {
<<<<<<< HEAD
		                     echo "<a href='./gallery.php?id=" . $uid_p . "' target='_top'><- Previous</a>";
=======
		                     echo "<a href='./index.php?id=" . $uid_p . "' target='_top'><- Previous</a>";
>>>>>>> ade5b10b99ad264bc7a6d74f3926ec5853339482
                                } else {
				     echo "<a style='color: gray' target='_top'><- Previous</a>";
				}
				echo " | ";
<<<<<<< HEAD
				echo "<a href='./gallery.php?id=" . $uid_n . "' target='_top'>Next -></a>";
=======
				echo "<a href='./index.php?id=" . $uid_n . "' target='_top'>Next -></a>";
>>>>>>> ade5b10b99ad264bc7a6d74f3926ec5853339482
				echo '<br>
				<br>
				<a href="./upload_ui.php" target="_top">Click here</a> to add images.
			</div>
        </div>
	</div>
</body>
</html>';
}
?>
