<?php
	/*MARTINA SOSTO - TESINA - 5AIN - AS 2016/17 */
	session_start();
	require_once('Connessione.php');
	$username=$_SESSION['username'];
	$usernamemd5=$_SESSION['usernamemd5'];
	$foto=$_SESSION['foto'];

	
?>

<html>
	<head>
		<title>CV Creator - Account</title>
		<link rel="stylesheet" type="text/css" href="../_css/stylesheet_home.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
	<body>

		<!--SIDEBAR-->
		<div class="container-home">
			<div class="sidebar">
				<?php
					echo '<img src="';
					echo $foto;
					echo '"style="width:100%"';
					echo 'alt="';
					echo $foto;
					echo '"style="width:100%">';
				?>

				<div class="sidebar-home">
					<a href="home.php" class="sidebar-oggetti">
						<i class="fa fa-home"></i>
						<p>Home</p>
					</a>
					<a href="cv.php?id=<?php echo $usernamemd5; ?>" target="_blank" class="sidebar-oggetti">
						<i class="fa fa-eye"></i>
						<p>Visualizza CV</p>
					</a>
					<a href="modifica.php" class="sidebar-oggetti">
						<i class="fa fa-pencil"></i>
						<p>Modifica CV</p>
					</a>
					<a href="account.php" class="sidebar-oggetti">
						<i class="fa fa-user"></i>
						<p>Account</p>
					</a>
					<a href="login.php?logout=true" class="sidebar-oggetti">
						<i class="fa fa-sign-out"></i>
						<p>Logout</p>
					</a>
				</div>
			</div>

			<!--BOX-->
			<div class="box-home" ="max-width: 1100px;>
				<div class="box-account">
					<h1 class="titolo-rosa">Sei loggato come <?php echo $_SESSION['username']?> </h1>
					<p>Qua puoi modificare le informazioni relative al tuo account come il nome utente, la mail, la password e la tua immagine personale</p><br>
						
					<?php
						/*MESSAGGI*/
						if(isset($_SESSION["modifica1"])){
							if($_SESSION["modifica1"]=="errato"){
								echo '<font color= "red">Le password che hai inserito non corrispondono.</font><br>';
							}
							if($_SESSION["modifica1"]=="successo"){
								echo '<font color= "green">La password è stata cambiata con successo.</font><br>';
							}
							unset($_SESSION["modifica1"]);
						}
							
						if(isset($_SESSION["modifica2"])){
							if($_SESSION["modifica2"]=="errato"){
								echo '<font color= "red">L &#8217 username che hai inserito non è valido o è già esistente.</font><br>';
							}
							if($_SESSION["modifica2"]=="successo"){
								echo '<font color= "green">L &#8217 username è stato cambiato con successo.</font><br>';
							}
							unset($_SESSION["modifica2"]);
						}
							
						if(isset($_SESSION["modifica3"])){
							if($_SESSION["modifica3"]=="errato"){
								echo '<font color= "red">La mail che hai inserito non è valido o è già esistente.</font><br>';
							}
							if($_SESSION["modifica3"]=="successo"){
								echo '<font color= "green">La mail è stata cambiata con successo.</font><br>';
							}
							unset($_SESSION["modifica3"]);		
						}
							
						if(isset($_SESSION["modifica4"])){
							if($_SESSION["modifica4"]=="esiste"){
								echo '<font color= "red">Il file che hai caricato è già esistente, cambia nome del file o il file stesso.</font><br>';
							}
							if($_SESSION["modifica4"]=="dimensione"){
								echo '<font color= "red">La dimensione del file è troppo grande, carica un file più piccolo.</font><br>';
							}
							if($_SESSION["modifica4"]=="tipo"){
								echo '<font color= "red">L &#8217 estensione del file che vuoi caricare non è consentita, puoi caricare solo file PNG, JPG, JPEG o GIF.</font><br>';
							}
							if($_SESSION["modifica4"]=="errore"){
								echo '<font color= "red">Abbiamo riscontrato un errore nel caricare il file.</font><br>';
							}

							if($_SESSION["modifica4"]=="errore1"){
								echo '<font color= "red">Abbiamo riscontrato un errore nel caricare il file. ah boh</font><br>';
							}
							if($_SESSION["modifica4"]=="successo"){
								echo '<font color= "green">Il file &egrave stato caricato con successo.</font><br>';
							}
							unset($_SESSION["modifica4"]);		
						}

						if(isset($_SESSION["modifica5"])){
							if($_SESSION["modifica5"]=="errore"){
								echo '<font color= "red">Hai lasciato il campo vuoto.</font><br>';
							}
							if($_SESSION["modifica5"]=="successo"){
								echo '<font color= "green">Le modifiche sono avvenute con successo.</font><br>';
							}
							unset($_SESSION["modifica5"]);		
						}
					?>


					<?php
						/*MODIFICA ASPIRAZIONI*/
						echo 
						'<p class="titolo-rosa">Inserisci o modifica le tue aspirazioni professionali o lavorative.</p>'
						;

						if($_SESSION['aspirazioni']!="null" && strlen($_SESSION['aspirazioni'])!=0){

							if(isset ($_SESSION['aspirazionimod'])){
									
								unset($_SESSION['aspirazionimod']);
								echo
									'<form action="account_elaborazione.php" method="POST" id="form1">
										<textarea class="input-form" rows="4" cols="50" name="aspirazioni" form="form1" maxlength="500" style="height: 150px;">'; echo $_SESSION['aspirazioni']; echo '</textarea><br>
										<input id="bottone-rosa" type="submit" name="aggiungiaspirazioni" value="Aggiungi">
									</form><br>'
								;
									
							}
							else{
								echo 
									'<p>'; echo $_SESSION['aspirazioni']; echo'</p><br>
									<form action="account_elaborazione.php" method="POST">
										<input id="bottone-rosa" type="submit" name="aspirazionibottone" value="Modifica">
									</form><br>'
								;
							}	
						}
						else{

							echo 
								'<form action="account_elaborazione.php" method="POST" id="form1">
									<p>Non hai incora inserito niente, scrivi qua per aggiungere qualcosa.</p><br>
									<textarea class="input-form" rows="4" cols="50" name="aspirazioni" form="form1" maxlength="500" style="height: 150px;"></textarea><br>
									<input id="bottone-rosa" type="submit" name="aggiungiaspirazioni" value="Aggiungi">
								</form><br>'
							;
						}
					?>

						
					<?php
					/*MODIFICA HOBBY*/
						echo 
						'<p class="titolo-rosa">Inserisci o modifica i tuoi hobby.</p>'
						;

						if($_SESSION['hobby']!="null" && strlen($_SESSION['hobby'])!=0){

							if(isset ($_SESSION['hobbymod'])){
									
								unset($_SESSION['hobbymod']);
								echo
									'<form action="account_elaborazione.php" method="POST" id="form1">
										<textarea class="input-form" rows="4" cols="50" name="hobby" form="form1" maxlength="500" style="height: 150px;">'; echo $_SESSION['hobby']; echo '</textarea><br>
										<input id="bottone-rosa" type="submit" name="aggiungihobby" value="Aggiungi">
									</form><br>'
								;
									
							}
							else{
								echo 
									'<p>'; echo $_SESSION['hobby']; echo'</p><br>
									<form action="account_elaborazione.php" method="POST">
										<input id="bottone-rosa" type="submit" name="hobbybottone" value="Modifica">
									</form><br>'
								;
							}	
						}
						else{

							echo 
								'<form action="account_elaborazione.php" method="POST" id="form1">
									<p>Non hai incora inserito niente, scrivi qua per aggiungere qualcosa.</p><br>
									<textarea class="input-form" rows="4" cols="50" name="hobby" form="form1" maxlength="500" style="height: 150px;"></textarea><br>
									<input id="bottone-rosa" type="submit" name="aggiungihobby" value="Aggiungi">
								</form><br>'
							;
						}
					?>


					<!--MODIFICA USERNAME
					<form action="account_elaborazione.php" method="POST">
						<p class="titolo-rosa">Modifica username</p>
						<label>Inserisci il nuovo username</label><br>
						<input class="input-form" type="text" name="username" placeholder="Es: Utente123" maxlength="20" required>
						<input id="bottone-rosa" type="submit" name="submit" value="Modifica">
					</form><br>-->
						
					<!--MODIFICA MAIL-->
					<form action="account_elaborazione.php" method="POST">
						<p class="titolo-rosa">Modifica mail</p>
						<label>Inserisci la nuova mail</label><br>
						<input class="input-form" type="email" name="mail" placeholder="esempio@mail.com" maxlength="40" required>
						<input id="bottone-rosa" type="submit" name="submit" value="Modifica">
					</form><br>
						
					<!--MODIFICA PASSWORD-->
					<form action="account_elaborazione.php" method="POST">
						<p class="titolo-rosa">Modifica password</p>
						<label>Inserisci la vecchia password, la nuova deve essere lunga almeno 8 caratteri</label><br>
						<input class="input-form" type="password" name="old" placeholder="Es: Password123" maxlength="20" required><br>
						<label>Inserisci la nuova password</label><br>
						<input class="input-form" type="password" name="newpw" placeholder="Es: Password123" maxlength="20" minlength="8" required><br>
						<label>Ripeti la nuova password</label><br>
						<input class="input-form" type="password" name="newpwagain" placeholder="Es: Password123" maxlength="20" minlength="8" required><br>
						<input id="bottone-rosa" type="submit" name="submit" value="Modifica">
					</form><br>
						
					<!--MODIFICA FOTO-->
					<form action="account_elaborazione.php" method="post" enctype="multipart/form-data">
						<p class="titolo-rosa">Modifica l &#8217 immagine del tuo account </p>
						<label>Cambia immagine per personalizzare il tuo account, seleziona la foto che vuoi caricare:</label><br><br>
						<input class="input-form" type="file" name="fileToUpload" id="fileToUpload">
						<input id="bottone-rosa" type="submit" value="Carica l &#8217 immagine" name="submitfoto">
					</form>

					<!--ELIMINA FOTO-->
					<form action="account_elaborazione.php" method="POST">
						<input id="bottone-rosa" type="submit" value="Ripristina foto" name="eliminafoto">
					</form>
				</div>					
			</div>
		</div>

		<!--COPYRIGHT-->
		<p class="copyright-login"> Creato da Martina S. </p>
	</body>
</html>