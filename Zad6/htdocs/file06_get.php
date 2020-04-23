<?php
	session_start();
	$link = mysqli_connect("localhost", "scott", "tiger", "instytut");
	if (!$link) {
		printf("Connect failed: %s\n", mysqli_connect_error());
		exit();
	}
	echo '<html><head><meta http-equiv="Content-Type" content="text/html; charset=utf-8"/></head><body>';
	echo "<h2>Lista pracowników</h2>";
	
	$sql = "SELECT * FROM pracownicy ORDER BY id_prac";
	$result = $link->query($sql);
	echo "<table border=\"1\"><tr><td><b>id_prac</b>&nbsp;</td><td><b>nazwisko</b></td></tr>";
	foreach ($result as $v) {
		echo "<tr><td>" . $v["ID_PRAC"] . "</td><td>" . $v["NAZWISKO"] . "</td></tr>";
	}
	echo '</table><br><a href="file06_post.php">Dodaj nowego pracownika</a>';
	
	if(isSet($_SESSION["sukces"]) and $_SESSION["sukces"] == 1) {
		echo "<br><p style='color:#00e600; font-weight:bold;'>Pomyślnie dodano nowego pracownika!</p>";
		unset($_SESSION["sukces"]);
	}
	
	echo '</body></html>';
	$result->free();
	$link->close();
?>