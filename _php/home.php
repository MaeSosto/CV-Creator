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
		<title>CV Creator - Home</title>
		<link rel="stylesheet" type="text/css" href="../_css/stylesheet_home.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
	<!--SIDEBAR-->
	<body style="min-height="100%">
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
			<div class="box-home">
				<div class="box-account">
				
					<h1 class="titolo-rosa">Benvenuto <?php echo $_SESSION['nome']?>! </h1>

					<p>Questo &egrave tutto quello che sappiamo di te, aggiungi o modifica i tuoi dati per avere un curriculum più completo possibile.</p><br>
					
					<p><font class="titolo-rosa"> Username: </font><?php echo $_SESSION['username']?></p>
					<p><font class="titolo-rosa"> Mail: </font><?php echo $_SESSION['mail']?></p>
					<p><font class="titolo-rosa"> Nome: </font><?php echo $_SESSION['nome']?></p>
					<p><font class="titolo-rosa"> Cognome: </font><?php echo $_SESSION['cognome']?></p>
					<p><font class="titolo-rosa"> Data di nascita: </font><?php echo $_SESSION['data']?></p>
					<p><font class="titolo-rosa"> Luogo di nascita: </font><?php echo $_SESSION['luogo']?></p>
					<p><font class="titolo-rosa"> Nazionalità: </font><?php echo $_SESSION['nazionalita']?></p>
					<p><font class="titolo-rosa"> Lingua madre: </font><?php echo $_SESSION['madre']?></p>
					<p><font class="titolo-rosa"> Sesso: </font><?php echo $_SESSION['sesso']?></p>
					<p><font class="titolo-rosa"> Numero di telefono: </font><?php echo $_SESSION['numtel']?></p>
					<?php

						if(strlen ($_SESSION['numtel2'])!="null"){
							echo '<p><font class="titolo-rosa"> Numero secondario: </font>';
							echo $_SESSION["numtel2"];
							echo '</p>';
						}
						
						if(strlen ($_SESSION['patente'])!="null"){
							echo '<p><font class="titolo-rosa"> Patente: </font>';
							echo $_SESSION["patente"];
							echo '</p>';
						}

						//ASPIRAZIONI
						if($_SESSION['aspirazioni']!="null" && strlen($_SESSION['aspirazioni'])!=0){
							echo '<p><font class="titolo-rosa">Aspirazioni: </font><br>';
							echo $_SESSION["aspirazioni"];
							echo '</p>';
						}

						//HOBBY
						if($_SESSION['hobby']!="null" && strlen($_SESSION['hobby'])!=0){
							echo '<p><font class="titolo-rosa"> Hobby: </font><br>';
							echo $_SESSION["hobby"];
							echo '</p>';
						}
					
						/*INFORMAZIONI SUL LAVORO*/
						$username=$_SESSION['username'];
						$query=$conn->prepare("SELECT * FROM lavoro WHERE (username='$username')");
						$query->execute();
						$count=$query->rowCount();
						if($count>0){
							
					
							echo '<br><p><font class="titolo-rosa">Impieghi lavorativi:</p>';	
							require_once('Connessione.php');
							$username=$_SESSION['username'];
							$query=$conn->prepare("SELECT nome, luogo, descrizione, datainizio, datafine, settore FROM lavoro WHERE username='$username' ORDER BY datainizio DESC");
							$query->execute();
					
							echo '<table>
									<tr>
										<td>Nome</td>
										<td>Luogo</td>
										<td>Descrizione</td>
										<td>Data inizio</td>
										<td>Data fine</td>
										<td>Settore</td>
									</tr>'
							;
						
							while($row = $query->fetch(PDO::FETCH_BOTH)){
					
								echo	
									'<tr><td>'
								;
								
								echo	$row['nome'];
								echo	'</td>
										<td>'
								;

								echo	$row['luogo'];
								echo	'</td>
										<td>'
								;

								echo	$row['descrizione'];
								echo	'</td>
										<td>'
								;

								echo	$row['datainizio'];
								echo	'</td>
										<td>'
								;

								echo	$row['datafine'];
								echo	'</td>
										<td>'
								;

								echo	$row['settore'];
								echo	'</td>
									</tr>'
								;
							}
						
							echo
								'</table><br><br>'
							;
						}
					

						/*INFORMAZIONI SULLA FORMAZIONE*/
						$username=$_SESSION['username'];
						$query=$conn->prepare("SELECT * FROM formazione WHERE (username='$username')");
						$query->execute();
						$count=$query->rowCount();
						if($count>0){
							
					
							echo '<br><p><font class="titolo-rosa">Impieghi formativi:</p>';	
							require_once('Connessione.php');
							$username=$_SESSION['username'];
							$query=$conn->prepare("SELECT nome, luogo, descrizione, datainizio, datafine FROM formazione WHERE username='$username' ORDER BY datainizio DESC");
							$query->execute();
					
							echo '<table>
								<tr>
									<td>Nome</td>
									<td>Luogo</td>
									<td>Descrizione</td>
									<td>Data inizio</td>
									<td>Data fine</td>
								</tr>'
							;
						
							while($row = $query->fetch(PDO::FETCH_BOTH)){
					
								echo	
									'<tr><td>'
								;
								
								echo	$row['nome'];
								echo	'</td>
										<td>'
								;

								echo	$row['luogo'];
								echo	'</td>
										<td>'
								;

								echo	$row['descrizione'];
								echo	'</td>
										<td>'
								;

								echo	$row['datainizio'];
								echo	'</td>
										<td>'
								;

								echo	$row['datafine'];
								echo	'</td>
									</tr>'
								;
							}
						
							echo
								'</table><br><br>'
							;
						}
					
						/*INFORMAZIONI SULLA LINGUA*/
						$username=$_SESSION['username'];
						$query=$conn->prepare("SELECT * FROM lingua WHERE (username='$username')");
						$query->execute();
						$count=$query->rowCount();
						if($count>0){
							
							
							echo '<br><p><font class="titolo-rosa">Lingua:</p>';	
							$query=$conn->prepare("SELECT lingua, ascolto, lettura, interazione, orale, scritto FROM lingua WHERE username='$username' ORDER BY lingua");
							$query->execute();
						

							echo'<table>
								<tr>
									<tr>
										<td>Lingua</td>
										<td colspan="2">Compresione</td>
										<td colspan="2">Parlato</td>
										<td>Produzione scritta</td>
									<tr>
									<tr>
										<td></td>
										<td>Ascolto</td>
										<td>Lettura</td>
										<td>Interazione</td>
										<td>Produzione orale</td>
										<td></td>
									<tr>'
							;
							
							while($row = $query->fetch(PDO::FETCH_BOTH)){
						
								echo	
									'<tr><td>'
								;
								
								echo	$row['lingua'];
								echo	'</td><td>'
								;

								echo	$row['ascolto'];
								echo	'</td><td>'
								;

								echo	$row['lettura'];
								echo	'</td><td>'
								;

								echo	$row['interazione'];
								echo	'</td><td>'
								;

								echo	$row['orale'];
								echo	'</td><td>'
								;

								echo	$row['scritto'];
								echo	'</td><td></tr>'
								;
							}
							
							echo
								'</table><br><br>'
							;
						}
						
						/*INFORMAZIONI SULLE COMPETENZE DIGITALI*/
						$username=$_SESSION['username'];
						$query=$conn->prepare("SELECT * FROM digitali WHERE (username='$username')");
						$query->execute();
						$count=$query->rowCount();
						if($count>0){
							
							$query=$conn->prepare("SELECT elaborazione, comunicazione, creazione, sicurezza, risoluzione FROM digitali WHERE username='$username'");
							$query->execute();
							
							echo '<br><p><font class="titolo-rosa">Competenze digitali:</p>';
							echo'<table>
								<tr>
									<tr>
										<td>Elaborazione delle informazioni</td>
										<td>Comunicazione</td>
										<td>Creazione dei contenuti</td>
										<td>Sicurezza</td>
										<td>Risoluzione dei problemi</td>
									<tr>
								<tr>'
							;
							
							while($row = $query->fetch(PDO::FETCH_BOTH)){
						
								echo	
									'<tr><td>'
								;		
								echo	$row['elaborazione'];
								echo	'</td>
										<td>'
								;

								echo	$row['comunicazione'];
								echo	'</td>
										<td>'
								;

								echo	$row['creazione'];
								echo	'</td>
										<td>'
								;

								echo	$row['sicurezza'];
								echo	'</td><td>'
								;

								echo	$row['risoluzione'];
								echo	'</td><td></tr>'
								;
							}
							
							echo
								'</table><br><br>'
							;
						}
					?>
				</div>
			</div>
		</div>

		<!--COPYRIGHT-->
		<p class="copyright-login"> Creato da Martina S. </p>
	</body>
</html>