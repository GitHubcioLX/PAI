<?php session_start(); ?>
<!DOCTYPE html>
<html>
	<head>
		<title>PHP</title>
		<meta charset='UTF-8' />
	</head>
	<body>
		<?php
			require_once("funkcje.php");
			if(isSet($_GET["utworzCookie"]) and $_GET["czas"] != "") {
				$czas = $_GET["czas"];
				setcookie("mycookie", "TEST", time() + $czas, "/");
				echo "Utworzono cookie ważne przez " . $czas . " sekund(y).";
			}
			else {
				header("Location: index.php");
			}
		?>
	</body>
	<br><br>
	<a href="index.php">Wstecz</a>
</html>
