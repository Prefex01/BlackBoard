<!doctype html>
<html>
<head>
	<meta charset="utf-8">
	<title>Das Schwarzebrett</title>
	<link href="stylesheet.css" rel="stylesheet" type="text/css">
</head>
<body>
<div id="seite">
<header>
	<p>Das Schwarzebrett</p>
</header>
<div class="row">
    <section>
		<nav>
			<div>
				<a href="#" id="elf" onclick="document.getElementById('ele').style.display='block';document.getElementById('elf').style.display='none'">Anzeige aufgeben</a>
				<div id="ele">
					<a href="#" id="elg" onclick="document.getElementById('ele').style.display='none';document.getElementById('elf').style.display='block'">Anzeige aufgeben</a>
					<form action="schreiben.php" method="get">
						<table id="tabelle" style="border=1" width="230px">
							<tr>
								<td>Nickname:</td>
								<td width="3em"><input  class="eingabe"type="text" name="name"></td>
							</tr>
							<tr>
								<td>E-Mail:</td>
								<td><input class="eingabe" type="email" name="mail"></td>
							</tr>
							<tr>
								<td>Bezeichnung:</td>
								<td><input class="eingabe" type="text" name="description"></td>
							</tr>
							<tr>
								<td>Rubrik:</td>
								<td>
									<select class="eingabe" name="rubrik" size="1">
										<option value="0">Lehr- und Lernmittel</option>
										<option value="1">Elektronik</option>
										<option value="2">Mode</option>
										<option value="3">Dienstleistungen</option>
										<option value="4">Sonstiges</option>
									</select>
								</td>
							</tr>
							<tr>
								<td>Preis:</td>
								<td><input class="eingabe" type="text" name="preis"></td>
							</tr>
							<tr>
								<td>Text:</td>
								<td><input class="eingabe" type="textbox" name="text"></td>
							</tr>
							<tr>
								<td><input class="eingabe" type="reset" value="Abbrechen"></td>
								<td><input class="eingabe" type="submit" name="Senden" value="Aufgeben!"></td>
							</tr>
						</table>
						<br>
					</form>
				</div><br><br>
				<p>Such-Einstellungen (WIP)</p>
				<form>
					<table id="tabelle" style="border=1" width="230px">
						<tr>
							<td>Kriterium:</td>
							<td width="3em">
								<select class="eingabe" name="rubriksuchen" size="1">
									<option value="100" disabled selected>Rubrik zum Suchen auswählen</option>
									<option value="0">Lehr- und Lernmittel</option>
									<option value="1">Elektronik</option>
									<option value="2">Mode</option>
									<option value="3">Dienstleistungen</option>
									<option value="4">Sonstiges</option>
								</select>
							</td>
						</tr>
						<tr>
							<td>Suchwort:</td>
							<td width="3em"><input class="eingabe" type="text" name="suchwort"></td>
						</tr> 
						<tr>
							<td><input class="eingabe" type="reset" value="Abbrechen"></td>
							<td><input class="eingabe" type="submit" value="Suchen!"></td>
						</tr>
					</table>
				</form><br><br>
			</div>
			<div>
				<?php 
					SESSION_START();
					echo "Eingeloggt als: ".$_SESSION["login_user"]; 
				?> 
			</div>
		</nav>
		<div class="main">
			<article>
				<div class="linie">
					<?php
						include("config.php");			//Laden der 'config.php'
						
						if($_SESSION["login"]==1){		//Wenn "login" des '$_SESSION' Arrays = 1 ist, Dann...
						
							/*if($_GET["rubriksuchen"]<"100"){					//Rubrik-Suchen (WIP)
								$filter = $suchrubrik;
								$anzeigen = mysqli_query($link, "SELECT a.idAnzeige, a.Text, a.Preis, a.Datum, a.Titel, a.Inserent_idInserent, a.Rubriken_idRubriken, i.Nickname FROM anzeige a JOIN inserent i ON i.idInserent = a.Inserent_idInserent WHERE a.Rubriken_idRubriken = '".$filter."'");
							} else if($_GET["suchwort"]!="hallu"){				//Wort-Suchen (WIP)
								$filter = $suchwort;
								$anzeigen = mysqli_query($link, "SELECT a.idAnzeige, a.Text, a.Preis, a.Datum, a.Titel, a.Inserent_idInserent, a.Rubriken_idRubriken, i.Nickname FROM anzeige a JOIN inserent i ON i.idInserent = a.Inserent_idInserent WHERE a.idAnzeige = '".$filter."' OR a.Text = '".$filter."' OR a.Preis = '".$filter."' OR a.Datum = '".$filter."' OR a.Titel = '".$filter."'");
							} else {*/
								$anzeigen = mysqli_query($link, "SELECT a.idAnzeige, a.Text, a.Preis, a.Datum, a.Titel, a.Inserent_idInserent, a.Rubriken_idRubriken, i.Nickname FROM anzeige a JOIN inserent i ON i.idInserent = a.Inserent_idInserent");
							//}								//...Ergebnis des querys (holt sich alle relevanten Daten aus der Datenbank) wird in '$anzeigen' gespeichert
							
							while($row_0 = mysqli_fetch_row($anzeigen)){ 	//Solange..., Wird...
								echo '<div class="kasten text-center">';		//Div-Box (CSS)
								echo 'Anzeige: '.$row_0[0].' - '.$row_0[4].'<br/><br/><br/>'.$row_0[1].'<br/><br/>'.$row_0[2].' EUR<br><br><b>Von: </b>'.$row_0[7];	//gibt Felder (0,4,1,2,7) des Arrays '$row_0' aus (mithilfe von echo)
								echo '</div>';
							}
						} else {			//Sonst (wenn nicht "login" = 1), dann...
							echo "Bitte loggen sie sich erst ein!";			//Text wird ausgegeben.
						}
					?>
				</div>
			</article>
		</div>
	</section>
</div>
<footer>
	<p>by Enzo Cardone</p>
</footer>
</div>
</body>
</html>
