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
		<div class="main1">
			<div class="mittig">
			<p>Login</p>
				<form method="post">
					<table id="tabelle" style="border=1" width="230px">
						<tr>
							<td>Nutzername:</td>
							<td width="3em"><input class="eingabe" type="text" name="username"></td>		
						</tr>
						<tr>
							<td>Password:</td>
							<td width="3em"><input class="eingabe" type="password" name="password"></td>	
						</tr> 
						<tr>
							<td><input class="eingabe" type="reset" value="Abbrechen"></td>					
							<td><input class="eingabe" type="submit" value="Einloggen!"></td>
						</tr>
					</table>
				</form>
			</div>
			<?php																						//Anfang von PHP-Login-Teil
				include("config.php");																	//Die Config laden
				SESSION_START();																		//...session starten

			   	if($_SERVER["REQUEST_METHOD"] == "POST") {									//Wenn die Nachfrag-Methode = 'Post' ist, dann...
					
				    $myusername = mysqli_real_escape_string($link,$_POST['username']);		//...den übergebenen usernamen
				    $mypassword = mysqli_real_escape_string($link,$_POST['password']); 		//...
				    
					$queryResult = mysqli_query($link, "SELECT PwHash FROM inserent WHERE Nickname='$myusername'");
					$pw = mysqli_fetch_array($queryResult);

					$test = password_verify($mypassword, $pw['PwHash']);

					//Eingegebenes Password mit dem aus der Datenabnk vergleichen (übernimmt auch entschlüsselung)


					echo($test);
					
					if($test){
						$query1 = "SELECT idInserent FROM inserent WHERE Nickname='$myusername'";		//
						$result = mysqli_query($link,$query1);					//Ergebniss des Querys wird in '$result' gespeichert
						$row = mysqli_fetch_array($result,MYSQLI_ASSOC);		//[noch beschreiben]   <-- gucken ob nötig
						
						$count = mysqli_num_rows($result);								//Anzahl der Datensätze wird in '$count' gespeichert

						if($count == 1) {												//Wenn '$count' = 1 ist, Dann...
							$_SESSION["login"] = 1;											//...wird in dem globalen Array(:'$_SESSION'), 'login' gleich 1 gesetzt.
						    $_SESSION["login_user"] = $myusername;							//...,'login_user' gleich '$myusername' gesetzt
						    header("location: Ausgabe.php");								//geht über zur Seite 'Ausgabe.php'
						} else {														//...wenn nicht '$count' = 1, dann...
							echo "$error";													//'$error' Ausgeben
						}
					}
				}
			?>	
		</div>
	</section>
</div>
<footer>
	<p>by Enzo Cardone</p>
</footer>
</div>
</body>
</html>
