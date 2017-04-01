<?php
	include("config.php");
	
	$name = $_GET["name"];		
	$mail = $_GET["mail"];		
	$bezeichnung = $_GET["description"];	
	$rubrik = $_GET["rubrik"];
	$text = $_GET["text"];		
	$timestamp = date("Y-m-d H:i:s");	
	$preis = $_GET["preis"];
	$insNr = intval(2);
	//$intRub = intval('$rubrik');
	//$intPreis = intval('$preis');
	
	echo"$name<br>$mail<br>$bezeichnung<br>$rubrik<br>$text<br>$timestamp<br>$preis<br>$insNr<br>";
	
	$query = "INSERT INTO anzeige (Text,Preis, Titel, Datum,Inserent_idInserent, Rubriken_idRubriken) VALUES ('".$text."','".$preis."','".$bezeichnung."','".$timestamp."',2,'".$rubrik."')";
	mysqli_query($link, $query);

	$link->close();
?>
