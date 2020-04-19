<?php 
	session_start(); 
	require("funkcje.php");
	if(isSet($_POST["upload"])) {
		$currentDir = getcwd();
		$fileName = $_FILES["myfile"]["name"];
		$fileTmpName = $_FILES["myfile"]["tmp_name"];
		if($fileName != "")
		{
			$uploadPath = $currentDir . "/zdjecia/photo.png";
			move_uploaded_file($fileTmpName, $uploadPath);
		}
	}
	header("Location: user.php");
?>