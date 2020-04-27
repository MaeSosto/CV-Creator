<?php
	/*MARTINA SOSTO - TESINA - 5AIN - AS 2016/17 */
	session_start();
	if(isset($_GET["logout"])){
		if($_GET["logout"]=="true")
		session_unset(); 
	}
?>

<html>
	<head>
		<title>CV Creator - Login</title>
		<link rel="stylesheet" type="text/css" href="../_css/stylesheet_login.css">
	</head>

	<body class="body-login">
    	<div class="container-login">
			<div class="titolo-grande">
				<h1>CV CREATOR </h1>
            </div>
			
			<div class="box-login">
				<div class="barra-nera-login">
					<h3>Effettua il login!</h3>
				</div>
				
				<div class="form-login">

				<?php
					//MESSAGGI
					if(isset($_SESSION["login"])){
                    	if($_SESSION["login"]=="errato"){
							unset($_SESSION['login']);
                    		echo '<font color= "red">Username o password errati.</font><br>';
						}
					}
                    
                    if(isset($_SESSION["modifica1"])){
							if($_SESSION["modifica1"]=="successo"){
								echo '<font color= "green">La password è stata cambiata con successo.</font><br>';
							}
							unset($_SESSION["modifica1"]);
						}
					
					if(isset($_SESSION["registrazione"])){
                    	if($_SESSION["registrazione"]=="successo"){
                    		echo '<font color= "green">La registrazione &egrave andata a buon fine, inserisci i dati per effettuare il login.</font><br>';
						}
						unset($_SESSION["registrazione"]);
					}
				?>
					<!--FORM-->
					<form method="POST" action="login_elaborazione.php">
						<div class="input-login">
							<label>Username</label><br>
							<input id="shownusername" type="text" name="username" placeholder="username" required>
						</div>
						
						<div class="input-login">
							<label>Password</label><br>
							<input type="password" name="password" placeholder="password" minlength="8" required>
						</div>
						
						<div class="pulsanti-login">
							<p><input type="submit" name="login" value="Login" id="bottone-grigio"></p>
							
							<a href="registrazione.php">Non sei registrato? Clicca qua per iniziare!</a>
						</div>
					</form>
				</div>
			</div>
			
			<p class="copyright-login"> Creato da Martina S. </p>
		</div>
	</body>
</html>
