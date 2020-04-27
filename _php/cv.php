<?php
/*MARTINA SOSTO - TESINA - 5AIN - AS 2016/17 */
	session_start(); 
	$usernamemd5=$_GET['id']; 
	require_once('Connessione.php');
	
	
	
	$query=$conn->prepare("SELECT * FROM utenti WHERE (usernamemd5 ='$usernamemd5')");
	$query->execute();
	$count=$query->rowCount();
	$queryresult=$query->fetch(PDO::FETCH_OBJ);
		
	$username=$queryresult->username;
	$mail=$queryresult->mail;
	$nome=$queryresult->nome;
	$cognome=$queryresult->cognome;
	$luogo=$queryresult->luogo;
	$sesso=$queryresult->sesso;
	$nazionalita=$queryresult->nazionalita;
	$numtel=$queryresult->numtel;
	$numtel2=$queryresult->numtel2;
	$patente=$queryresult->patente;
	$data=$queryresult->data;
	$foto=$queryresult->foto;
	$aspirazioni=$queryresult->aspirazioni;
	$hobby=$queryresult->hobby;
 ?>

<html>
	<head>
		<title>CV Creator - <?php echo $nome." ".$cognome ?></title>
		<link rel="stylesheet" type="text/css" href="../_css/stylesheet_cv.css">
		<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
	</head>
	
	<body>
		<div class="container" style="max-width:1400px;">

			<!--SINISTRA-->
			<div class="sinistra">
				<div class="sinistrainterno">
					<div class="foto">
						<?php
							echo '<img src="';
							echo $foto;
							echo '"style="width:100%"';
							echo 'alt="';
							echo $foto;
							echo '"style="width:100%">';
						?>
						
						<div class="nome">
							<?php
								echo '<h2>';
								echo "$nome"." "."$cognome";
								echo '</h2>';
							?>
						</div>
					</div>

					<SINISTRA - INFO-->	
					<div class="sinistragiu">
					
						<p><i class="fa fa-calendar-o fa-fw "></i><?php echo $data;?></p>
						<p><i class="fa fa-envelope fa-fw"></i><?php echo $mail;?></p>
						<p><i class="fa fa-mobile fa-fw"></i><?php echo $numtel;?></p>
						<?php
							if(strlen ($numtel2)!="null"){
								echo '<p><i class="fa fa-phone fa-fw "></i>';
								echo $numtel2;
								echo '</p>';
							}
							
							if(strlen ($patente)!="null"){
								echo '<p><i class="fa fa-car fa-fw "></i>';
								echo $patente;
								echo '</p>';
							}
						?>

						<p><i class="fa fa-flag fa-fw"></i><?php echo $nazionalita;?></p>
						<p><i class="fa fa-home fa-fw "></i><?php echo $luogo;?></p>
						<hr>
						
						
						<?php
						//SINISTRA - LINGUA
							$query=$conn->prepare("SELECT * FROM lingua WHERE (username='$username')");
							$query->execute();
							$count=$query->rowCount();
							if($count>0){
						
								$query=$conn->prepare("SELECT lingua, ascolto, lettura, interazione, orale, scritto FROM lingua WHERE username='$username' ORDER BY lingua");
								$query->execute();
							
								while($row = $query->fetch(PDO::FETCH_BOTH)){
									echo '<p class="titolini"><b><i class="fa fa-globe fa-fw "></i>';
									echo $row['lingua'];
									echo '</b></p>';
								
									echo '<p>Ascolto</p>';
								
									if($row['ascolto']=="A2")
										$a=15;
									if($row['ascolto']=="A1")
										$a=30;
									if($row['ascolto']=="B2")
										$a=45;
									if($row['ascolto']=="B1")
										$a=60;
									if($row['ascolto']=="C2")
										$a=75;
									if($row['ascolto']=="C1")
										$a=90;
								
									echo '<div class="lingue" style="width:90%">';
										echo '<div class="barra" style="width:';
										echo $a;
										echo '%">';
										echo $row['ascolto'];
										echo '</div>';
									echo '</div>';
								
									echo '<p>Lettura</p>';
								
									if($row['lettura']=="A2")
										$a=15;
									if($row['lettura']=="A1")
										$a=30;
									if($row['lettura']=="B2")
										$a=45;
									if($row['lettura']=="B1")
										$a=60;
									if($row['lettura']=="C2")
										$a=75;
									if($row['lettura']=="C1")
										$a=90;
								
									echo '<div class="lingue" style="width:90%">';
										echo '<div class="barra" style="width:';
										echo $a;
										echo '%">';
										echo $row['lettura'];
										echo '</div>';
									echo '</div>';
								
									echo '<p>Interazione</p>';
								
									if($row['interazione']=="A2")
										$a=15;
									if($row['interazione']=="A1")
										$a=30;
									if($row['interazione']=="B2")
										$a=45;
									if($row['interazione']=="B1")
										$a=60;
									if($row['interazione']=="C2")
										$a=75;
									if($row['interazione']=="C1")
										$a=90;
								
									echo '<div class="lingue" style="width:90%">';
										echo '<div class="barra" style="width:';
										echo $a;
										echo '%">';
										echo $row['interazione'];
										echo '</div>';
									echo '</div>';
								
									echo '<p>Orale</p>';
								
									if($row['orale']=="A2")
										$a=15;
									if($row['orale']=="A1")
										$a=30;
									if($row['orale']=="B2")
										$a=45;
									if($row['orale']=="B1")
										$a=60;
									if($row['orale']=="C2")
										$a=75;
									if($row['orale']=="C1")
										$a=90;
								
									echo '<div class="lingue" style="width:90%">';
										echo '<div class="barra" style="width:';
										echo $a;
										echo '%">';
										echo $row['orale'];
										echo '</div>';
									echo '</div>';
								
								
									echo '<p>Scritto</p>';
								
									if($row['scritto']=="A2")
										$a=15;
									if($row['scritto']=="A1")
										$a=30;
									if($row['scritto']=="B2")
										$a=45;
									if($row['scritto']=="B1")
										$a=60;
									if($row['scritto']=="C2")
										$a=75;
									if($row['scritto']=="C1")
										$a=90;
								
									echo '<div class="lingue" style="width:90%">';
										echo '<div class="barra" style="width:';
										echo $a;
										echo '%">';
										echo $row['scritto'];
										echo '</div>';
									echo '</div>';		  
								}

								echo '<br><hr>';
							}
					
							//SINISTRA - COMPETENZE DIGITALI
							$query=$conn->prepare("SELECT * FROM digitali WHERE (username='$username')");
							$query->execute();
							$count=$query->rowCount();
							if($count>0){
						
								$query=$conn->prepare("SELECT elaborazione, comunicazione, creazione, sicurezza, risoluzione FROM digitali WHERE username='$username'");
								$query->execute();
							
								while($row = $query->fetch(PDO::FETCH_BOTH)){
									echo '<p class="titolini"><b><i class="fa fa-laptop fa-fw "></i>Competenze digitali</b></p>';
								
									echo '<p>Elaborazione delle informazioni</p>';
								
									if($row['elaborazione']=="Utente base")
										$a=30;
									if($row['elaborazione']=="Utente intermedio")
										$a=60;
									if($row['elaborazione']=="Utente avanzato")
										$a=90;
							
								
									echo '<div class="lingue" style="width:90%">';
										echo '<div class="barra" style="width:';
										echo $a;
										echo '%">';
										echo $row['elaborazione'];
										echo '</div>';
									echo '</div>';
								
								
									echo '<p>Comunicazione</p>';
								
									if($row['comunicazione']=="Utente base")
										$a=30;
									if($row['comunicazione']=="Utente intermedio")
										$a=60;
									if($row['comunicazione']=="Utente avanzato")
										$a=90;
							
								
									echo '<div class="lingue" style="width:90%">';
										echo '<div class="barra" style="width:';
										echo $a;
										echo '%">';
										echo $row['comunicazione'];
										echo '</div>';
									echo '</div>';
								
								
									echo '<p>Creazione dei contenuti</p>';
								
									if($row['creazione']=="Utente base")
										$a=30;
									if($row['creazione']=="Utente intermedio")
										$a=60;
									if($row['creazione']=="Utente avanzato")
										$a=90;
							
								
									echo '<div class="lingue" style="width:90%">';
										echo '<div class="barra" style="width:';
										echo $a;
										echo '%">';
										echo $row['creazione'];
										echo '</div>';
									echo '</div>';
								
								
									echo '<p>Sicurezza</p>';
								
									if($row['sicurezza']=="Utente base")
										$a=30;
									if($row['sicurezza']=="Utente intermedio")
										$a=60;
									if($row['sicurezza']=="Utente avanzato")
										$a=90;
							
								
									echo '<div class="lingue" style="width:90%">';
										echo '<div class="barra" style="width:';
										echo $a;
										echo '%">';
										echo $row['sicurezza'];
										echo '</div>';
									echo '</div>';
								
								
									echo '<p>Risoluzione dei problemi</p>';
								
									if($row['risoluzione']=="Utente base")
										$a=30;
									if($row['risoluzione']=="Utente intermedio")
										$a=60;
									if($row['risoluzione']=="Utente avanzato")
										$a=90;
							
								
									echo '<div class="lingue" style="width:90%">';
										echo '<div class="barra" style="width:';
										echo $a;
										echo '%">';
										echo $row['risoluzione'];
										echo '</div>';
									echo '</div>';
								}

								echo '<br><hr>';
							}
						?>
					</div>
				</div>
			</div>
			
			<!--DESTRA-->
			<div class="destra">
				
				<div class="eventi">

					<?php
						//ASPIRAZIONI

						if($aspirazioni!="null" && strlen($aspirazioni)!=0){
							echo ' <h2><i class="fa fa-handshake-o titolo"></i>Aspirazioni</h2>';
						
							echo '<p>'; 
							echo $aspirazioni;
							echo '</p><br>';
						}
					?>
				</div>

				<div class="eventi">

					<?php
						//HOBBY

						if($hobby!="null" && strlen($hobby)!=0){
							echo ' <h2><i class="fa fa-futbol-o titolo"></i>Hobby</h2>';
						
							echo '<p>'; 
							echo $hobby;
							echo '</p><br>';
						}
					?>
				</div>


				<div class="eventi">

					<?php
						//LAVORI
						$query=$conn->prepare("SELECT nome, luogo, descrizione, datainizio, datafine, settore FROM lavoro WHERE username='$username' ORDER BY datainizio");
						$query->execute();
						$count=$query->rowCount();
						if($count>0){
							echo ' <h2><i class="fa fa-suitcase fa-fw titolo"></i>Esperienze lavorative</h2>';
						
							while($row = $query->fetch(PDO::FETCH_BOTH)){
								
								echo '<h5><b>';
								echo $row['nome'];
								echo '</b></h5>';
								
								echo '<h5><i class="fa fa-map-marker"></i>';
								echo $row['luogo'];
								echo '</b></h5>';
								
								echo '<h6><i class="fa fa-calendar fa-fw"></i>Dal ';
								echo  $row['datainizio'];
								echo ' al ';
								echo $row['datafine'];
								echo '</h6>';
								
								echo '<p>';
								echo $row['descrizione'];
								echo '</p>';
								
								echo '<p>';
								echo $row['settore'];
								echo '</p>';
								
							echo '<hr>';
							}
						}
					?>
				</div>
				
				<div class="eventi">
					
					<?php
					//ISTRUZIONE
						$query=$conn->prepare("SELECT nome, luogo, descrizione, datainizio, datafine FROM formazione WHERE username='$username' ORDER BY datainizio");
						$query->execute();
						$count=$query->rowCount();
						if($count>0){
							echo '<h2><i class="fa fa-graduation-cap titolo"></i>Esperienze formative</h2>';
					
							while($row = $query->fetch(PDO::FETCH_BOTH)){
								
								echo '<h5><b>';
								echo $row['nome'];
								echo '</b></h5>';
								
								echo '<h5><i class="fa fa-map-marker"></i>';
								echo $row['luogo'];
								echo '</b></h5>';
								
								echo '<h6><i class="fa fa-calendar fa-fw"></i>Dal ';
								echo  $row['datainizio'];
								echo ' al ';
								echo $row['datafine'];
								echo '</h6>';
								
								echo '<p>';
								echo $row['descrizione'];
								echo '</p>';
								echo '<hr>';
							}
						}
					?>
				</div>
			</div>
		</div>

		<!--COPYRIGHT-->
		<p class="copyright"> Creato da Martina S. </p><br>
	</body>
</html>