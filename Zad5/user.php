<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
	<meta charset='UTF-8' />
</head>
<body>
	<?php
		if(isSet($_SESSION["zalogowany"]) and $_SESSION["zalogowany"] == 1) {
			require_once("funkcje.php");
			echo "Zalogowano<br>";
			echo "<b>" . $_SESSION["zalogowanyImie"] . "</b><br>";
		}
		else {
			header("Location: index.php");
		}
	?>
	<form action="index.php" method="post">
		<input type="submit" value="Wyloguj" name="wyloguj">
	</form>
	<br>
	<img src="/zdjecia/photo.png" alt="zdjęcie użytkownika">
	<br><br>
	<fieldset>
		<legend>UPLOAD ZDJĘCIA</legend>
		<form action="upload.php" method="post" enctype="multipart/form-data">
			<input name="myfile" type="file" accept="image/png, image/jpeg, image/PNG, image/JPEG">
			<input name="upload" type="submit">
		</form>
	</fieldset>
	<br>
	<a href="index.php">Powrót na stronę główną</a>
</body>
</html>
