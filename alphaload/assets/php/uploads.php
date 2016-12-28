<?php

if(strpos($_SERVER['REQUEST_URI'], "upload.php") !== false){
	if(isset($_POST['SUpload'])){
		$target_dir = "assets/uploads/songs/";
		$filename = basename($_FILES["songToUpload"]["name"]);
		$target_file = $target_dir . $filename;
		$uploadOk = 1;
		$sent = 0;
		if (file_exists($target_file)) {
		    $uploadOk = 0;
		    $error = "File already exists!";
		}
		if ($uploadOk == 0) {
			$error = "There's an error in the basename";
		} else {
		    if(move_uploaded_file($_FILES["songToUpload"]["tmp_name"], $target_file)){
			    $sent = 1;
		    }
		}
	}
	if(isset($_POST['SLUpload'])){
		$target_dir = "assets/uploads/spaceload/";
		$filename = basename($_FILES["fileToUpload"]["name"]);
		$target_file = $target_dir . $filename;
		$uploadOk = 1;
		$sent = 0;
		if (file_exists($target_file)) {
		    $uploadOk = 0;
		    $error = "File already exists!";
		}
		if ($uploadOk == 0) {
			$error = "There's an error in the basename";
		} else {
		    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
			    $sent = 1;
		    }
		}
	}
	if(isset($_POST['LLUpload'])){
		$target_dir = "assets/uploads/laserload/";
		$filename = basename($_FILES["fileToUpload"]["name"]);
		$target_file = $target_dir . $filename;
		$uploadOk = 1;
		$sent = 0;
		if (file_exists($target_file)) {
		    $uploadOk = 0;
		    $error = "File already exists!";
		}
		if ($uploadOk == 0) {
			$error = "There's an error in the basename";
		} else {
		    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
			    $sent = 1;
		    }
		}
	}
	if(isset($_POST['CSUpload'])){
		$target_dir = "assets/uploads/csgoload/";
		$filename = $_FILES["fileToUpload"]["name"];
		$target_file = $target_dir . $filename;
		$uploadOk = 1;
		$sent = 0;
		if (file_exists($target_file)) {
		    $uploadOk = 0;
		    $error = "File already exists!";
		}
		if ($uploadOk == 0) {
			$error = "There's an error in the basename";
		} else {
		    if(move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)){
			    $sent = 1;
		    }
		}
	}
	if(isset($_POST['spacedelete'])){
		$deleted = 0;
		if(file_exists("assets/uploads/spaceload/".$_POST['spacefile'])){
			unlink("assets/uploads/spaceload/".$_POST['spacefile']);
			$deleted = 1;
			$deletedfile = $_POST['spacefile'];
		}
	}
	if(isset($_POST['laserdelete'])){
		$deleted = 0;
		if(file_exists("assets/uploads/laserload/".$_POST['laserfile'])){
			unlink("assets/uploads/laserload/".$_POST['laserfile']);
			$deleted = 1;
			$deletedfile = $_POST['laserfile'];
		}
	}
	if(isset($_POST['csgodelete'])){
		$deleted = 0;
		if(file_exists("assets/uploads/csgoload/".$_POST['csgofile'])){
			unlink("assets/uploads/csgoload/".$_POST['csgofile']);
			$deleted = 1;
			$deletedfile = $_POST['csgofile'];
		}
	}
	if(isset($_POST['songdelete'])){
		$deleted = 0;
		if(file_exists("assets/uploads/songs/".$_POST['songfile'])){
			unlink("assets/uploads/songs/".$_POST['songfile']);
			$deleted = 1;
			$deletedfile = $_POST['songfile'];
		}
	}
}
