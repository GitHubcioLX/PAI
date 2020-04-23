<?php
session_start();
print<<<KONIEC
	<html>
		<head>
			<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
		</head>
		<body>
			<h2>Nowy pracownik</h2>
			<form action="file06_redirect.php" method="POST">
				<table>
					<tr>
						<td>id_prac: </td> 
						<td><input type="text" name="id_prac"></td>
					</tr>
					<tr>
						<td>nazwisko: </td> 
						<td><input type="text" name="nazwisko"></td>
					</tr>
					<tr>
						<td colspan=2 align="right">
							<input type="submit" value="Wstaw">
							<input type="reset" value="Wyczyść">
						</td>
					</tr>
				</table>
			</form>
			<a href="file06_get.php">Podgląd listy pracowników</a>
		</body>
	</html>
KONIEC;
	
	if(isSet($_SESSION["sukces"]) and $_SESSION["sukces"] == 0) {
		echo "<br><p style='color:red; font-weight:bold;'>Dodawanie pracownika zakończone niepowodzeniem!</p>";
		unset($_SESSION["sukces"]);
	}
?>