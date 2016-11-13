<?php
session_start();
$success = "";
include_once($_SERVER['DOCUMENT_ROOT'] . "/settings.php");
if (empty ( $_SESSION ['id'] )) {
	header ( "Location: login.php" );
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
				$success = "true";
			}
		}
	}
}
 	?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>Personal Cloud Upload Images</title>
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

	#menu ul {
		margin: 0px;
		padding-top: 0px;
		list-style-type: none;
	}

	#menu a {
		display: inline-block;
		width: 5em;
		text-align: center;
	}

	#menu a:hover {
		text-decoration: none;
	}

	#menu li {
		margin-right: 0.5em;
		display: inline-block;
		list-style: none;
	}
	.upload {
	width: 300px;
	height: 300px;
	border: 2px dashed #555;
	color: #555;
	line-height: 300px;
	text-align: center;
	margin: auto auto auto auto;
	position: relative;
	}
	.upload.dragover {
		border-color: black;
		color: black;
	}

	.upload.success {
		border-color: green;
		color: green;
	}
</style>
</head>
<body>
	<header>
		<h1>
			<i>Upload Images</i>
		</h1>
		<nav id="menu">
			<ul>
				<li><a href="./gallery.php?id=1" target="_top"><p>Gallery</p></a></li>
                <li><a href="./logout.php" target="_top"><p>Logout</p></a></li>
			</ul>
		</nav>
	</header>
	<div id="main">
		<div id="pagewrap" style="text-align: center; padding: 20px;">
			<div class="upload" id="upload" style="display: inline-block;">Drag
				and Drop Files Here</div>
			<div style="display: inline-block; padding-left: 100px">
				<b><u>Note:</u></b> Drag and drop is experimental <br> but the
				button version should always work.<br> Uploaded files must end with
				.png, .jpg, or .gif<br>
				<form style="padding-top: 10px" action="upload_ui.php" method="post"
					enctype="multipart/form-data">
					<input type="file" name="file"> <input type="submit" name="upload"
						value="Upload">
				</form>
				<br>
                <?php if ($success == 'true') : ?>
                    <strong style='color: green;'>Upload Successful</strong>
                <?php endif; ?>
            </div>
			<script>
                (function() {
                    var uploadzone = document.getElementById('upload');
                    var upload = function(files) {
                        var formData = new FormData(),
                            xhr = new XMLHttpRequest(),
                            x;
                        for(x = 0; x < files.length; x = x + 1) {
                            formData.append('file[]', files[x]);
                        }
                        xhr.onload = function() {
                            var data = this.responseText;
                            //console.log(data);
                        }
                        xhr.open('post', './save.php');
                        xhr.send(formData);
                    }
                    uploadzone.ondrop = function(e) {
                        e.preventDefault();
                        this.className = 'upload success'
                        upload(e.dataTransfer.files);
                    }
                    uploadzone.ondragover = function() {
                        this.className = 'upload dragover';
                        return false;
                    }
                    uploadzone.ondragleave = function() {
                        this.className = 'upload';
                        return false;
                    }
                 }());
            </script>
		</div>
	</div>
</body>
</html>