<?php
	$db_server 	= 'localhost';
	$db_usr 		= 'root';
	$db_pw 		= '';
	$db_name 	= 'schwarzesbrettdb';

	$error_0 = "Error (0): Verbindung nicht möglich!";
	$error_1 = "Error (1): Nicht gefunden!";
	$error_2 = "Der Benutzername oder das Passwort ist nicht korrekt";//...Tect in '$error' speichern

	$link = mysqli_connect($db_server,$db_usr,$db_pw) or die ($error_0);
	mysqli_select_db($link,$db_name) or die ($error_1);
?>
