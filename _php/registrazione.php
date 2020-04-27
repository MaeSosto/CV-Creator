
<?php
/*MARTINA SOSTO - TESINA - 5AIN - AS 2016/17 */
	session_start();
?>
<html>
	<head>
		<title>CV Creater - Registrazione</title>
		<link rel="stylesheet" type="text/css" href="../_css/stylesheet_registrazione.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>

	<body>
		<div class="logout">
			<a href="login.php" id="bottone-rosa">
				<i class="fa fa-chevron-circle-left fa-3x"></i>
			</a>
		</div>
		<div class="container-form" style="max-width: 60%;">
			<div class="box-form">
				<h1 class="titolo-rosa">Benvenuto, raccontaci chi sei!</h1>
				<p>Tutti i campi con ** non sono obbligatori.<br>
				Una volta registrato potrai modificare/aggiungere ulteriori informazioni.</p><br>
				
				<?php
				/*MESSAGGI*/
					if(isset($_SESSION["registrazione"])){
                    	if($_SESSION["registrazione"]=="fallito"){
                    		echo '<font color= "red">I dati che hai inserito (username o mail) sono gi&agrave utilizzati </font><br>';
						}
						if($_SESSION["registrazione"]=="wrong"){
                    		echo '<font color= "red">Hai inserito male i dati</font><br>';
						}
						if($_SESSION["registrazione"]=="pw"){
                    		echo '<font color= "red">Le password non corrispondono</font><br>';
						}
						if($_SESSION["registrazione"]=="privacy"){
                    		echo '<font color= "red">Prima di poter continuare devi accettare il trattamento dei dati personali!</font><br>';
						}
						session_unset();
					}
				?>

				<!--FORM-->	
				<form action="registrazione_elaborazione.php" method="POST">
					<p class="titolo-rosa">Informazioni di login</p>
					<label>Username</label>
					<input class="input-form" type="text" name="username" placeholder="Es: Utente123" maxlength="20" required><br>
					<label>Password (minimo 8 caratteri)</label>
					<input class="input-form" type="password" name="password" placeholder="Es: Password123" maxlength="20" minlength="8" required><br>
					<label>Ripeti password</label>
					<input class="input-form" type="password" name="ripetipw" placeholder="Es: Password123" maxlength="20" minlength="8" required><br>
					<label>Mail</label>
					<input class="input-form" type="email" name="mail" placeholder="esempio@mail.com" maxlength="40" required><br>
					
					<p class="titolo-rosa">Informazioni personali</p>
					<label>Nome</label>
					<input class="input-form" type="text" name="nome" placeholder="Mario" maxlength="20" required><br>
					<label>Cognome</label>	
					<input class="input-form" type="text" name="cognome" placeholder="Rossi" maxlength="20" required><br>
					<label>Data di nascita</label>	
					<input class="input-form" type="date" name="data" min="1920-01-01" required><br>
					<label>Luogo di nascita</label>	
					<input class="input-form" type="text" name="luogo" placeholder="Es: Roma" maxlength="30" required><br>
					<label>Sesso</label><br><br>	
					<input type="radio" name="sesso" value="femmina">Femmina<br><br>
					<input type="radio" name="sesso" value="maschio">Maschio<br><br>
				
					<p class="titolo-rosa">Altre informazioni</p>
					<label>Nazionalit&agrave</label>	
					<input class="input-form" type="text" name="nazionalita" placeholder="Es: Italiana" maxlength="20" required><br>
					<label>Numero di telefono</label>	
					<input class="input-form" type="tel" name="cellulare" placeholder="Es: 123456789" maxlength="15" required><br>
					<label>Numero di telefono secondario**</label>	
					<input class="input-form" type="tel" name="telefono" placeholder="Es: 123456789" maxlength="15"><br>
					<label>Patente** </label>	
					<input class="input-form" type="text" name="patente" placeholder="Es: B" maxlength="2" style='text-transform:uppercase' ><br><br>
					
					<input type="checkbox" name="check" value="Privacy">Autorizzo il trattamento dei dati personali contenuti nel mio curriculum vitae in base art. 13 del D. Lgs. 196/2003<br><br><br>
			
					<input id="bottone-rosa" type="submit" name="submit" value="Registrati">
				</form>
			</div>	
		</div>

		<!--COPYRIGHT-->
		<p class="copyright-form"> Creato da Martina S. </p><br>
	</body>
</div>