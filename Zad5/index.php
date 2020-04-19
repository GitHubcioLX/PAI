<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>PHP</title>
	<meta charset='UTF-8' />
</head>
<body>
	<?php
		require("funkcje.php");
		echo "<h1>Nasz system</h1>";
		if(isSet($_POST["wyloguj"])) {
			$_SESSION["zalogowany"] = 0;
		}
	?>
	<form action="logowanie.php" method="post">
		<fieldset>
			<legend>LOGOWANIE</legend>
			<table>
				<tr>
					<td>Login: </td>
					<td><input type="text" name="login"></td>
				</tr>
				<tr>
					<td>Hasło: </td>
					<td><input type="password" name="haslo"></td>
				</tr>
				<tr>
					<td colspan=2 align="right"><input type="submit" value="Zaloguj" name="zaloguj"></td>
				</tr>
			</table>
		</fieldset>
	</form>
	<br>
	<a href="user.php">Przejdź na stronę użytkownika</a>
	<br><br>
	<form action="cookie.php" method="get">
		<fieldset>
			<legend>TWORZENIE COOKIE</legend>
			<table>
				<tr>
					<td>Czas życia: </td>
					<td><input type="number" name="czas"></td>
				</tr>
				<tr>
					<td colspan=2 align="right"><input type="submit" name="utworzCookie" value="Utwórz"></td>
				</tr>
			</table>
		</fieldset>
	</form>
	<br>
	<?php
		if(isSet($_COOKIE["mycookie"])) {
			echo "Aktualna wartość cookie: " . $_COOKIE["mycookie"];
		}
	?>
</body>
</html>
