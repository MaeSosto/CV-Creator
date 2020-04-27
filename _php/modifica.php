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
		<title>CV Creator - Modifica CV</title>
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
			<div class="box-home" ="max-width: 1200px;>
				<div class="box-account">
					<h1 class="titolo-rosa">Modifica le informazioni del tuo Curriculum Vitae </h1>
					<p>Qua puoi modificare, aggiungere o cancellare le informazioni relative alle tue esperienze lavorative e formative, puoi inoltre aggiungere il livello di conoscenza delle lingue, competenze digitali o altro.</p><br>
					
					
					<p class="titolo-rosa">Modifica le informazioni riguardanti le tue esperienze professionali</p>
					<?php
						/*LAVORO*/
						$query=$conn->prepare("SELECT * FROM lavoro WHERE (username='$username')");
						$query->execute();
						$count=$query->rowCount();
						if($count==0){

						/*LAVORO - NESSUN DATO*/							
							if(!isset ($_SESSION['lavoroagg'])){
								
								echo 
									'<form action="modifica_elaborazione.php" method="POST">
										<font color= "red">Non hai ancora registrato nessuna esperienza lavorativa. Aggiungi le informazioni per poter visualizzare un rapporto.</font><br>
										<input id="bottone-rosa" type="submit" name="aggiungi" value="Aggiungi">
									</form>'
								;
							}
							
							else{
								if($_SESSION['lavoroagg']=="agg"){
									unset($_SESSION["lavoroagg"]);
									
									if(isset ($_SESSION["lavoro"])){
										if($_SESSION["lavoro"]=="fail"){
											echo "<font color='red'>Hai compilato male il form</font><br>";
											unset($_SESSION["lavoro"]);
										}
									
										else if($_SESSION["lavoro"]=="date"){
											echo "<font color='red'>Hai inserito male le date, non puoi iniziare un lavoro dopo la data di fine</font><br>";
											unset($_SESSION["lavoro"]);
										}
									}

									/*LAVORO - AGGIUNTA*/
									echo 
										'<form action="modifica_elaborazione.php" method="POST" id="form">
												<p>I campi con ** sono obbligatori.<br>
													Una volta aggiunto l &#8217 impiego potrai modificare/aggiungere ulteriori informazioni. Se si sta inserendo una professione attuale (data di fine corrente) inserisci la data di oggi.</p><br>
												
												<label>Lavoro**</label><br>
												<input class="input-form" type="text" name="nome_lavoro" maxlength="50" required><br><br>
												
											
												<label>Nome e località (facoltativamente anche indirizzo completo o sito web)**</label><br>
												<textarea class="input-form" rows="4" cols="50" name="luogo_lavoro" form="form" maxlength="150" style="height: 120px;" required></textarea><br><br>
												
												<label>Descrizione dettaglita (le principali attività e responsabilità)**</label><br>
												<textarea class="input-form" rows="4" cols="50" name="descrizione_lavoro" form="form" maxlength="500" style="height: 150px;" required></textarea><br><br>
												
												<label>Data inizio**</label><br>
												<input class="input-form" type="date" name="datainizio_lavoro" min="1920-01-01" required><br><br>
												
												<label>Data fine**</label><br>
												<input class="input-form" type="date" name="datafine_lavoro" min="1920-01-01" required><br><br>
												
												<label>Attività o settore</label><br>
												<input class="input-form" type="text" name="settore_lavoro" maxlength="50"><br><br>
												
												<input id="bottone-rosa" type="submit" name="lavoroagg" value="Aggiungi">
										</form><br>'
									;
								}	
							}		
						}

						/*LAVORO - MESSAGGI*/
						else{
							if(isset ($_SESSION['lavoro'])){
								if($_SESSION['lavoro']=="successo"){
									echo "<font color= 'green'>I dati riguardanti il tuo lavoro sono stati inseriti correttamente.</font><br>";
								}

								else if($_SESSION['lavoro']=="eliminato"){
									echo "<font color= 'green'>I dati riguardanti il tuo lavoro sono stati eliminati correttamente.</font><br>";
								}

								else if($_SESSION['lavoro']=="cambiato"){
									echo "<font color= 'green'>Le modifiche sono state effettuate correttamente.</font><br>";

								}

								else if($_SESSION["lavoro"]=="fail"){
										echo "<font color='red'>Hai compilato male il form per aggiungere una nuova esperienza lavorativa, ritenta.</font><br>";
								}

								else if($_SESSION["lavoro"]=="date"){
									echo "<font color='red'>Hai inserito male le date, non puoi iniziare un lavoro dopo la data di fine.</font><br>";
								}

								else if($_SESSION["lavoro"]=="eli"){
									echo "<font color='red'>Seleziona che campo vuoi eliminare.</font><br>";
								}
								
								unset($_SESSION["lavoro"]);
							}
							
							/*LAVORO - STAMPA TABELLA*/										
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
									'<tr>
										<td>'
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
								
							
							/*LAVORO - BOTTONI*/
							if(!isset ($_SESSION['lavoroagg'])){
								
								echo 
									'<form action="modifica_elaborazione.php" method="POST">
										<input id="bottone-rosa" type="submit" name="aggiungi" value="Aggiungi">
										<input id="bottone-rosa" type="submit" name="modifica" value="Modifica">
										<input id="bottone-rosa" type="submit" name="elimina" value="Elimina">
									</form>'
								;
							}

							/*LAVORO - ELIMINAZIONE*/							
							else{
								if($_SESSION['lavoroagg']=="eli"){	
									unset($_SESSION["lavoroagg"]);
									
									
									$query=$conn->prepare("SELECT nome FROM lavoro WHERE username='$username' ORDER BY datainizio DESC");
									$query->execute();
										
									echo 
										'<form action="modifica_elaborazione.php" method="POST">
										<p class="titolo-rosa">Scegli l &#8217 evento che vuoi eliminare</p><br>
										<select name="eliminazione">
										<option value="null">-</option>'
									;

									
									while($row = $query->fetch(PDO::FETCH_BOTH)){
										echo	'<option value="';
										echo $row['nome'];
										echo '">';
										echo $row['nome'];
										echo '</option>';
									}
									
									echo '</select>
										<input id="bottone-rosa" type="submit" name="lavoroeli" value="Elimina">'
									;
								}

								/*LAVORO - AGGIUNTA*/								
								else if($_SESSION['lavoroagg']=="agg"){
									unset($_SESSION["lavoroagg"]);

									echo 
										'<form action="modifica_elaborazione.php" method="POST" id="form1">
												<p class="titolo-rosa">Aggiungi un evento</p>
												<p>I campi con ** sono obbligatori.<br>
												Una volta aggiunto l &#8217 impiego potrai modificare/aggiungere ulteriori informazioni. Se si sta inserendo una professione attuale (data di fine corrente) inserisci la data di oggi.</p><br>
												
												<label>Lavoro**</label><br>
												<input class="input-form" type="text" name="nome_lavoro" maxlength="50" required><br><br>
												
											
												<label>Nome e località (facoltativamente anche indirizzo completo o sito web)**</label><br>
												<textarea class="input-form" rows="4" cols="50" name="luogo_lavoro" form="form1" maxlength="150" style="height: 120px;" required></textarea><br><br>
												
												<label>Descrizione dettaglita (le principali attività e responsabilità)**</label><br>
												<textarea class="input-form" rows="4" cols="50" name="descrizione_lavoro" form="form1" maxlength="500" style="height: 150px;" required></textarea><br><br>
												
												<label>Data inizio**</label><br>
												<input class="input-form" type="date" name="datainizio_lavoro" min="1920-01-01" required><br><br>
												
												<label>Data fine**</label><br>
												<input class="input-form" type="date" name="datafine_lavoro" min="1920-01-01" required><br><br>
												
												<label>Attività o settore</label><br>
												<input class="input-form" type="text" name="settore_lavoro" maxlength="50"><br><br>
												
												<input id="bottone-rosa" type="submit" name="lavoroagg" value="Aggiungi">
										</form><br>'
									;	
								}

								/*LAVORO - MODIFICA*/								
								else if($_SESSION['lavoroagg']=="mod"){
									
									unset($_SESSION["lavoroagg"]);
									
									
									$query=$conn->prepare("SELECT nome FROM lavoro WHERE username='$username' ORDER BY datainizio DESC");
									$query->execute();
									
									
									echo 
										'<form action="modifica_elaborazione.php" method="POST">
										<p class="titolo-rosa">Scegli il nome dell &#8217 evento che vuoi modificare.</p>
																			
										<select name="nomeform">
										<option value="null">-</option>'
									;
									
									while($row = $query->fetch(PDO::FETCH_BOTH)){
										echo	'<option value="';
										echo $row['nome'];
										echo '">';
										echo $row['nome'];
										echo '</option>';
									}

									
									echo '</select><br><input id="bottone-rosa" type="submit" name="lavoromod" value="Modifica"></form><br>';
								}
									
								else if($_SESSION['lavoroagg']=="mod1"){

									unset($_SESSION["lavoroagg"]);

									echo
										'<form action="modifica_elaborazione.php" method="POST" id="form2">

											<p class="titolo-rosa">Reinserisci i dati che vuoi modificare. Se si sta inserendo una professione attuale (data di fine corrente) inserisci la data di oggi.</p>
											<label>Tutti i campi con ** sono obbligatori.</label><br><br>	
												
											<label>Lavoro**</label><br>
											<input class="input-form" type="text" name="nome_lavoro" maxlength="50" value="';  echo $_SESSION['nome_lavoro']; echo'" required><br><br>
												
											
											<label>Nome e località (facoltativamente anche indirizzo completo o sito web)**</label><br>
											<textarea class="input-form" rows="4" cols="50" name="luogo_lavoro" form="form2" maxlength="150" style="height: 120px;"  required>'; echo $_SESSION['luogo_lavoro']; echo '</textarea><br>
												
												
											<label>Descrizione dettaglita (le principali attività e responsabilità)**</label><br>
											<textarea class="input-form" rows="4" cols="50" name="descrizione_lavoro" form="form2" maxlength="500" style="height: 150px;" required>'; echo $_SESSION['descrizione_lavoro']; echo'</textarea><br><br>
												
											<label>Data inizio**</label><br>
											<input class="input-form" type="date" name="datainizio_lavoro" min="1920-01-01" value="';  echo $_SESSION['datainizio_lavoro']; echo'" required><br><br>
												
											<label>Data fine**</label><br>
											<input class="input-form" type="date" name="datafine_lavoro" min="1920-01-01" value="';  echo $_SESSION['datafine_lavoro']; echo'" required><br><br>
												
											<label>Attività o settore</label><br>
											<input class="input-form" type="text" name="settore_lavoro" maxlength="50" value="';  echo $_SESSION['settore_lavoro']; echo'"><br><br>
												
											<input id="bottone-rosa" type="submit" name="lavoromodform" value="Modifica">
										</form><br>'
									;									
								}
							}								
						}

						/*FORMAZIONE ------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
						echo '<br><br><br><br>
							<p class="titolo-rosa">Modifica le informazioni riguardanti le tue qualifiche</p>'
						;
										
						
						$query=$conn->prepare("SELECT * FROM formazione WHERE (username='$username')");
						$query->execute();
						$count=$query->rowCount();
						if($count==0){
							
							/*FORMAZIONE - NESSUN DATO*/		
							if(!isset ($_SESSION['formazioneagg'])){
								
								echo 
									'<form action="modifica_elaborazione.php" method="POST">
										<font color= "red">Non hai ancora registrato nessuna esperienza formativa. Aggiungi le informazioni per poter visualizzare un rapporto.</font><br>
										<input id="bottone-rosa" type="submit" name="aggiungi1" value="Aggiungi">
									</form>'
								;
							}
							
							/*FORMAZIONE -  AGGIUNTA*/			
							else{
								if($_SESSION['formazioneagg']=="agg"){
									
									unset($_SESSION["formazioneagg"]);
									
									
									if(isset ($_SESSION["formazione"])){
										if($_SESSION["formazione"]=="fail"){
										echo "<font color= 'red'>Hai compilato male il form, ricordati di inserire tutti i campi obbligatori.</font><br>";
										unset($_SESSION["formazione"]);
										}

										else if($_SESSION["formazione"]=="date"){
											echo "<font color='red'>Hai inserito male le date, non puoi iniziare una formazione dopo la data di fine.</font><br>";
											unset($_SESSION["formazione"]);
										}
									}

									
									echo 
										'<form action="modifica_elaborazione.php" method="POST" id="form3">
												<p>I campi con ** sono obbligatori.<br>
													Una volta aggiunto l &#8217 evento potrai modificare/aggiungere ulteriori informazioni. Se si sta inserendo una formazione attuale (data di fine corrente) inserisci la data di oggi.</p><br>
												
												<label>Qualifica rilasciata**</label><br>
												<input class="input-form" type="text" name="nome_formazione" maxlength="50" required><br><br>
												
											
												<label> Nome e località (facoltativamente anche indirizzo completo o sito web) dell &#8217 organizzazione erogatrice dell &#8217 istruzione o formazione**</label><br>
												<textarea class="input-form" rows="4" cols="50" name="luogo_formazione" form="form3" maxlength="150" style="height: 120px;" required></textarea><br><br>
												
												
												<label>Descrivi le principali materie trattate o abilità acquisite**</label><br>
												<textarea class="input-form" rows="4" cols="50" name="descrizione_formazione" form="form3" maxlength="500" style="height: 150px;" required></textarea><br><br>
												
												<label>Data inizio**</label><br>
												<input class="input-form" type="date" name="datainizio_formazione" min="1920-01-01" required><br><br>
												
												<label>Data fine**</label><br>
												<input class="input-form" type="date" name="datafine_formazione" min="1920-01-01" required><br><br>
												
												<input id="bottone-rosa" type="submit" name="formazioneagg" value="Aggiungi">
										</form><br>'
									;
								}	
							}		
						}
						
						/*FORMAZIONE - MESSAGGI*/	
						else{
							if(isset ($_SESSION['formazione'])){
								if($_SESSION['formazione']=="successo"){
									echo "<font color= 'green'>I dati riguardanti la tua formazione sono stati inseriti correttamente.</font><br>";
								}

								else if($_SESSION['formazione']=="eliminato"){
									echo "<font color= 'green'>I dati riguardanti la tua formazione sono stati eliminati correttamente.</font><br>";
								}

								else if($_SESSION['formazione']=="cambiato"){
									echo "<font color= 'green'>Le modifiche sono state effettuate correttamente.</font><br>";
								}

								else if($_SESSION["formazione"]=="fail"){
										echo "<font color='red'>Hai compilato male il form per aggiungere una nuova esperienza formativa, ritenta.</font><br>";
								}

								else if($_SESSION["formazione"]=="date"){
										echo "<font color='red'>Hai inserito male le date, non puoi iniziare una formazione dopo la data di fine.</font><br>";
								}

								else if($_SESSION["formazione"]=="eli"){
									echo "<font color='red'>Seleziona che campo vuoi eliminare.</font><br>";
								}

								unset($_SESSION["formazione"]);
							}
							
							/*FORMAZIONE - STAMPA TABELLA*/				
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
									'<tr>
										<td>'
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
										<td>
									</tr>'
								;
							}
							
							echo
								'</table><br><br>'
							;
								
							
							/*FORMAZIONE - BOTTONI*/	
							if(!isset ($_SESSION['formazioneagg'])){
								
								echo 
									'<form action="modifica_elaborazione.php" method="POST">
										<input id="bottone-rosa" type="submit" name="aggiungi1" value="Aggiungi">
										<input id="bottone-rosa" type="submit" name="modifica1" value="Modifica">
										<input id="bottone-rosa" type="submit" name="elimina1" value="Elimina">
									</form>'
								;
							}
							
							/*FORMAZIONE - ELIMINAZIONE*/	
							else{
								if($_SESSION['formazioneagg']=="eli"){	
									
									unset($_SESSION["formazioneagg"]);
									
									
									$query=$conn->prepare("SELECT nome FROM formazione WHERE username='$username' ORDER BY datainizio DESC");
									$query->execute();
									
									echo 
										'<form action="modifica_elaborazione.php" method="POST">
										<p class="titolo-rosa">Scegli l &#8217 evento che vuoi eliminare.</p><br>
	
										
										<select name="eliminazione">
											<option value="null">-</option>'
									;
									
										while($row = $query->fetch(PDO::FETCH_BOTH)){
											echo	'<option value="';
											echo $row['nome'];
											echo '">';
											echo $row['nome'];
											echo '</option>';
										}
									
									echo '</select>
										<input id="bottone-rosa" type="submit" name="formazioneeli" value="Elimina">'
									;
								}
								
								/*FORMAZIONE - AGGIUNTA*/	
								else if($_SESSION['formazioneagg']=="agg"){
										
									unset($_SESSION["formazioneagg"]);
								
									
									if(isset ($_SESSION["formazione"])){
										if($_SESSION["formazione"]=="fail"){
										echo "<font color= 'red'>Hai compilato male il form, ritenta.</font><br>";
										unset($_SESSION["formazione"]);
										}
									}
									
									echo 
										'<form action="modifica_elaborazione.php" method="POST" id="form4">
												<p class="titolo-rosa">Aggiungi un evento</p>
												<p>I campi con ** sono obbligatori.<br>
													Una volta aggiunto l &#8217 evento potrai modificare/aggiungere ulteriori informazioni. Se si sta inserendo una formazione attuale (data di fine corrente) inserisci la data di oggi.</p><br>
												
												<label>Qualifica rilasciata**</label><br>
												<input class="input-form" type="text" name="nome_formazione" maxlength="50" required><br><br>
												
											
												<label> Nome e località (facoltativamente anche indirizzo completo o sito web) dell &#8217 organizzazione erogatrice dell &#8217 istruzione o formazione**</label><br>
												<textarea class="input-form" rows="4" cols="50" name="luogo_formazione" form="form4" maxlength="150" style="height: 120px;" required></textarea><br><br>
												
												
												<label>Descrivi le principali materie trattate o abilità acquisite**</label><br>
												<textarea class="input-form" rows="4" cols="50" name="descrizione_formazione" form="form4" maxlength="500" style="height: 150px;" required></textarea><br><br>
												
												<label>Data inizio**</label><br>
												<input class="input-form" type="date" name="datainizio_formazione" min="1920-01-01" required><br><br>
												
												<label>Data fine**</label><br>
												<input class="input-form" type="date" name="datafine_formazione" min="1920-01-01" required><br><br>
												
												<input id="bottone-rosa" type="submit" name="formazioneagg" value="Aggiungi">
										</form><br>'
									;
								}
								
								/*FORMAZIONE - MODIFICA*/	
								else if($_SESSION['formazioneagg']=="mod"){
									
									unset($_SESSION["formazioneagg"]);
									
									
									$query=$conn->prepare("SELECT nome FROM formazione WHERE username='$username' ORDER BY datainizio DESC");
									$query->execute();
									
									
									echo 
										'<form action="modifica_elaborazione.php" method="POST">
										<p class="titolo-rosa">Scegli il nome dell &#8217 evento che vuoi modificare.</p>
																			
										<select name="nomeform">
										<option value="null">-</option>'
									;
									
									while($row = $query->fetch(PDO::FETCH_BOTH)){
										echo	'<option value="';
										echo $row['nome'];
										echo '">';
										echo $row['nome'];
										echo '</option>';
									}

									
									echo '</select><br><input id="bottone-rosa" type="submit" name="formazionemod" value="Modifica"></form><br>';
								}
									
								else if($_SESSION['formazioneagg']=="mod1"){

									unset($_SESSION["formazioneagg"]);

									echo
										'<form action="modifica_elaborazione.php" method="POST" id="form5">

											<p class="titolo-rosa">Reinserisci i dati che vuoi modificare. Se si sta inserendo una professione attuale (data di fine corrente) inserisci la data di oggi.</p>
											<label>Tutti i campi sono obbligatori.</label><br><br>	
												
											<label>Qualifica rilasciata</label><br>
											<input class="input-form" type="text" name="nome_formazione" maxlength="50" value="';  echo $_SESSION['nome_lavoro']; echo'" required><br><br>
												
											
											<label>Nome e località (facoltativamente anche indirizzo completo o sito web) dell &#8217 organizzazione erogatrice dell &#8217 istruzione o formazione</label><br>
											<textarea class="input-form" rows="4" cols="50" name="luogo_formazione" form="form5" maxlength="150" style="height: 120px;" required>'; echo $_SESSION['luogo_lavoro']; echo '</textarea>
												
												
											<label>Descrivi le principali materie trattate o abilità acquisite</label><br>
											<textarea class="input-form" rows="4" cols="50" name="descrizione_formazione" form="form5" maxlength="500" style="height: 150px;" required>'; echo $_SESSION['descrizione_lavoro']; echo'</textarea><br><br>
												
											<label>Data inizio</label><br>
											<input class="input-form" type="date" name="datainizio_formazione" min="1920-01-01" value="';  echo $_SESSION['datainizio_lavoro']; echo'" required><br><br>
												
											<label>Data fine</label><br>
											<input class="input-form" type="date" name="datafine_formazione" min="1920-01-01" value="';  echo $_SESSION['datafine_lavoro']; echo'" required><br><br>
																								
											<input id="bottone-rosa" type="submit" name="formazionemodform" value="Modifica">
										</form><br>'
									;									
								}
							}								
						}
					
						/*LINGUE---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
					
						echo '<br><br><br><br>
							<p class="titolo-rosa">Modifica le informazioni riguardanti le lingue che conosci</p>'
						;
					
						
						//LINGUA MADRE
						echo 
						'<p>Lingua madre: '; echo $_SESSION['madre']; echo '</p>';

							
						if(isset ($_SESSION['madremod'])){
									
							unset($_SESSION['madremod']);
							echo
								'<form action="modifica_elaborazione.php" method="POST" >
									<input class="input-form" type="text" name="madre" maxlength="20" value="';  echo $_SESSION['madre']; echo'"><br>
									<input id="bottone-rosa" type="submit" name="aggiungimadre" value="Aggiungi">
								</form><br>'
							;
									
						}
						else{
							echo' 
								<form action="modifica_elaborazione.php" method="POST">
									<input id="bottone-rosa" type="submit" name="madrebottone" value="Modifica">
								</form><br>'
							;
						}	
						




						$query=$conn->prepare("SELECT * FROM lingua WHERE (username='$username')");
						$query->execute();
						$count=$query->rowCount();
						if($count==0){
							/*LINGUE - NESSUN DATO*/	
							if(!isset ($_SESSION['linguaagg'])){
								
								echo 
									'<form action="modifica_elaborazione.php" method="POST">
										<font color= "red">Non hai ancora registrato nessuna lingua. Aggiungi le informazioni per poter visualizzare un rapporto.</font><br>
										<input id="bottone-rosa" type="submit" name="aggiungi2" value="Aggiungi">
									</form>'
								;
							}

							else{
								/*LINGUE - AGGIUNTA*/
								if($_SESSION['linguaagg']=="agg"){
									
									unset($_SESSION["linguaagg"]);
									
									
									if(isset ($_SESSION["lingua"])){
										if($_SESSION["lingua"]=="fail"){
											echo "<font color= 'red'>Hai compilato male il form</font><br>";
											unset($_SESSION["lingua"]);
										}
									}

									
									echo 
										'<form action="modifica_elaborazione.php" method="POST">
											<p>Una volta aggiunte delle lingue potrai modificare/aggiungere ulteriori informazioni in seguito, tutti i campi sono obbligatori.<br>
												Livelli: A1/A2: Utente base  -  B1/B2: Utente intermedio  -  C1/C2: Utente avanzato </p><br>
							
											<label>Lingua</label><br>
											<input class="input-form" type="text" name="lingua" maxlength="20" placeholder="Es: Francese" required><br><br>
												
											<table>
												<tr>
													<tr>
														<td colspan="2">Compresione</td>
														<td colspan="2">Parlato</td>
														<td>Produzione scritta</td>
													<tr>
													<tr>
														<td>Ascolto</td>
														<td>Lettura</td>
														<td>Interazione</td>
														<td>Produzione orale</td>
														<td></td>
													<tr>
													<tr>
														<td>
															<select name="ascolto">
																<option value="null">-</option>
																<option value="A1">A1</option>
																<option value="A2">A2</option>
																<option value="B1">B1</option>
																<option value="B2">B2</option>
																<option value="C1">C1</option>
																<option value="C2">C2</option>
															</select>
														</td>
														<td>
															<select name="lettura">
																<option value="null">-</option>
																<option value="A1">A1</option>
																<option value="A2">A2</option>
																<option value="B1">B1</option>
																<option value="B2">B2</option>
																<option value="C1">C1</option>
																<option value="C2">C2</option>
															</select>
														</td>
														<td>
															<select name="interazione">
																<option value="null">-</option>
																<option value="A1">A1</option>
																<option value="A2">A2</option>
																<option value="B1">B1</option>
																<option value="B2">B2</option>
																<option value="C1">C1</option>
																<option value="C2">C2</option>
															</select>
														</td>
														<td>
															<select name="orale">
																<option value="null">-</option>
																<option value="A1">A1</option>
																<option value="A2">A2</option>
																<option value="B1">B1</option>
																<option value="B2">B2</option>
																<option value="C1">C1</option>
																<option value="C2">C2</option>
															</select>
														</td>
														<td>
															<select name="scritto">
																<option value="null">-</option>
																<option value="A1">A1</option>
																<option value="A2">A2</option>
																<option value="B1">B1</option>
																<option value="B2">B2</option>
																<option value="C1">C1</option>
																<option value="C2">C2</option>
															</select>
														</td>
													</tr>
												</table>
											<input id="bottone-rosa" type="submit" name="linguaagg" value="Aggiungi">
										</form><br>'
									;
								}	
							}		
						}
						
						/*LINGUE - MESSAGGI*/
						else{
							if(isset ($_SESSION["lingua"])){
								if($_SESSION["lingua"]=="fail"){
								echo "<font color= 'red'>Hai compilato male il form, ricordati di compilare tutti i campi obbligatori</font><br>";
								unset($_SESSION["lingua"]);
								}

								else if($_SESSION['lingua']=="successo"){
									echo "<font color= 'green'>I dati riguardanti la lingua sono stati inseriti correttamente.</font><br>";
								}
								else if($_SESSION['lingua']=="eliminato"){
									echo "<font color= 'green'>I dati riguardanti la lingua sono stati eliminati correttamente.</font><br>";
								}
								else if($_SESSION['lingua']=="cambiato"){
									echo "<font color= 'green'>Le modifiche sono state effettuate correttamente.</font><br>";
								}

								else if($_SESSION["lingua"]=="eli"){
									echo "<font color='red'>Seleziona che campo vuoi eliminare.</font><br>";
								}

								unset($_SESSION["lingua"]);
							}
							
							
							/*LINGUE - STAMPA TABELLA*/			
							$query=$conn->prepare("SELECT lingua, ascolto, lettura, interazione, orale, scritto FROM lingua WHERE username='$username' ORDER BY lingua");
							$query->execute();
					
							echo'<table><tr>
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
									'<tr>
										<td>'
								;		
								echo	$row['lingua'];
								echo	'</td>
										<td>'
									;
								echo	$row['ascolto'];
								echo	'</td>
										<td>'
									;
								echo	$row['lettura'];
								echo	'</td>
										<td>'
									;
								echo	$row['interazione'];
								echo	'</td>
										<td>'
									;
								echo	$row['orale'];
								echo	'</td>
										<td>'
									;
								echo	$row['scritto'];
								echo	'</td>
										<td>
									</tr>'
								;
							}
							
							echo
								'</table><br><br>'
							;
								
							
							/*LINGUE - BOTTONI*/
							if(!isset ($_SESSION['linguaagg'])){
								
								echo 
									'<form action="modifica_elaborazione.php" method="POST">
										<input id="bottone-rosa" type="submit" name="aggiungi2" value="Aggiungi">
										<input id="bottone-rosa" type="submit" name="elimina2" value="Elimina">
									</form>'
								;
							}
							
							/*LINGUE - ELIMINAZIONE*/
							else{
								if($_SESSION['linguaagg']=="eli"){	
									
									unset($_SESSION["linguaagg"]);
									
									
									$query=$conn->prepare("SELECT lingua FROM lingua WHERE username='$username' ORDER BY lingua");
									$query->execute();
									
									echo 
										'<form action="modifica_elaborazione.php" method="POST">
										<p class="titolo-rosa">Scegli la lingua che vuoi eliminare</p><br>
										<select name="eliminazione">
										<option value="null">-</option>'
									;
									
									while($row = $query->fetch(PDO::FETCH_BOTH)){
										echo	'<option value="';
										echo $row['lingua'];
										echo '">';
										echo $row['lingua'];
										echo '</option>';
									}
									
									echo '</select>
										<input id="bottone-rosa" type="submit" name="linguaeli" value="Elimina">'
									;
								}
								
								/*LINGUE - AGGIUNTA*/
								else if($_SESSION['linguaagg']=="agg"){
										
									unset($_SESSION["linguaagg"]);
								
									
									if(isset ($_SESSION["lingua"])){
										if($_SESSION["lingua"]=="fail"){
											echo "<font color= 'red'>Hai compilato male il form, ritenta.</font><br>";
											unset($_SESSION["formazione"]);
										}
									}
									
									echo 
										'<form action="modifica_elaborazione.php" method="POST">
											<p>Una volta aggiunte delle lingue potrai modificare/aggiungere ulteriori informazioni in seguito, tutti i campi sono obbligatori.<br>
											Livelli: A1/A2: Utente base  -  B1/B2: Utente intermedio  -  C1/C2: Utente avanzato </p><br>
												
											<label>Lingua</label><br>
											<input class="input-form" type="text" name="lingua" maxlength="20" placeholder="Es: Francese"><br><br>
												
											<table>
												<tr>
													<tr>
														<td colspan="2">Compresione</td>
														<td colspan="2">Parlato</td>
														<td>Produzione scritta</td>
													<tr>
													<tr>
														<td>Ascolto</td>
														<td>Lettura</td>
														<td>Interazione</td>
														<td>Produzione orale</td>
														<td></td>
													<tr>
													<tr>
														<td>
															<select name="ascolto">
																<option value="null">-</option>
																<option value="A1">A1</option>
																<option value="A2">A2</option>
																<option value="B1">B1</option>
																<option value="B2">B2</option>
																<option value="C1">C1</option>
																<option value="C2">C1</option>
															</select>
														</td>
														<td>
															<select name="lettura">
																<option value="null">-</option>
																<option value="A1">A1</option>
																<option value="A2">A2</option>
																<option value="B1">B1</option>
																<option value="B2">B2</option>
																<option value="C1">C1</option>
																<option value="C2">C1</option>
															</select>
														</td>
														<td>
															<select name="interazione">
																<option value="null">-</option>
																<option value="A1">A1</option>
																<option value="A2">A2</option>
																<option value="B1">B1</option>
																<option value="B2">B2</option>
																<option value="C1">C1</option>
																<option value="C2">C1</option>
															</select>
														</td>
														<td>
															<select name="orale">
																<option value="null">-</option>
																<option value="A1">A1</option>
																<option value="A2">A2</option>
																<option value="B1">B1</option>
																<option value="B2">B2</option>
																<option value="C1">C1</option>
																<option value="C2">C1</option>
															</select>
														</td>
														<td>
															<select name="scritto">
																<option value="null">-</option>
																<option value="A1">A1</option>
																<option value="A2">A2</option>
																<option value="B1">B1</option>
																<option value="B2">B2</option>
																<option value="C1">C1</option>
																<option value="C2">C2</option>
															</select>
														</td>
													</tr>
												</table>
											<input id="bottone-rosa" type="submit" name="linguaagg" value="Aggiungi">
										</form><br>'
									;
								}
							}
						}
						
						/* COMPETENZE DIGITALI---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/					
						
						echo '<br><br><br><br>
							<p class="titolo-rosa">Modifica le informazioni riguardanti le tue competenze digitali.</p>'
						;
						
						$query=$conn->prepare("SELECT * FROM digitali WHERE (username='$username')");
						$query->execute();
						$count=$query->rowCount();
						if($count==0){
							/*COMPETENZE - VUOTO*/
							if(!isset ($_SESSION['digitaliagg'])){
								
								echo 
									'<form action="modifica_elaborazione.php" method="POST">
										<font color= "red">Non hai ancora registrato le tue competenze. Aggiungi le informazioni per poter visualizzare un rapporto.</font><br>
										<input id="bottone-rosa" type="submit" name="aggiungi3" value="Aggiungi">
									</form>'
								;
							}
							/*COMPETENZE - AGGIUNGI*/
							else{
								if($_SESSION['digitaliagg']=="agg"){
									
									unset($_SESSION["digitaliagg"]);
									
									
									if(isset ($_SESSION["digitali"])){
										if($_SESSION["digitali"]=="fail"){
											echo "<font color= 'red'>Hai compilato male il form</font><br>";
											unset($_SESSION["digitali"]);
										}
									}
									
									echo 
										'<form action="modifica_elaborazione.php" method="POST">
											<p>Una volta aggiunte le tue competenze potrai modificarle in seguito, tutti i campi sono obbligatori.<br>
													Livelli: Utente base  -  Utente intermedio  -  Utente avanzato</p><br>
												
											<table>
												<tr>
													<tr>
														<td>Elaborazione delle informazioni</td>
														<td>Comunicazione</td>
														<td>Creazione dei contenuti</td>
														<td>Sicurezza</td>
														<td>Risoluzione dei problemi</td>
													<tr>
													<tr>
														<td>
															<select name="elaborazione">
																<option value="null">-</option>
																<option value="Utente base">Utente base</option>
																<option value="Utente intermedio">Utente intermedio</option>
																<option value="Utente avanzato">Utente avanzato</option>
															</select>
														</td>
														<td>
															<select name="comunicazione">
																<option value="null">-</option>
																<option value="Utente base">Utente base</option>
																<option value="Utente intermedio">Utente intermedio</option>
																<option value="Utente avanzato">Utente avanzato</option>
															</select>
														</td>
														<td>
															<select name="creazione">
																<option value="null">-</option>
																<option value="Utente base">Utente base</option>
																<option value="Utente intermedio">Utente intermedio</option>
																<option value="Utente avanzato">Utente avanzato</option>
															</select>
														</td>
														<td>
															<select name="sicurezza">
																<option value="null">-</option>
																<option value="Utente base">Utente base</option>
																<option value="Utente intermedio">Utente intermedio</option>
																<option value="Utente avanzato">Utente avanzato</option>
															</select>
														</td>
														<td>
															<select name="risoluzione">
																<option value="null">-</option>
																<option value="Utente base">Utente base</option>
																<option value="Utente intermedio">Utente intermedio</option>
																<option value="Utente avanzato">Utente avanzato</option>
															</select>
														</td>
													</tr>
												</table>
											<input id="bottone-rosa" type="submit" name="digitaliagg" value="Aggiungi">
										</form><br>'
									;
								}	
							}
						}

						else{
							/*COMPETENZE - MESSAGGI*/	
							if(isset ($_SESSION['digitali'])){
								if($_SESSION['digitali']=="successo"){
									echo "<font color= 'green'>I dati riguardanti le competenze sono stati inseriti correttamente.</font><br>";
								}
								else if($_SESSION['digitali']=="fail"){
									echo "<font color= 'red'>Reinserisci correttamente i dati riguardanti le tue competenze digitali.</font><br>";
								}
							
								unset($_SESSION["digitali"]);
							}
							
							/*COMPETENZE - STAMPA TABELLA*/			
							$query=$conn->prepare("SELECT elaborazione, comunicazione, creazione, sicurezza, risoluzione FROM digitali WHERE username='$username'");
							$query->execute();
					
							echo'
								<table>
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
									'<tr>
									<td>'
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
								echo	'</td>
										<td>'
								;

								echo	$row['risoluzione'];
								echo	'</td>
										<td></tr>'
								;
							}
							
							echo
								'</table><br><br>'
							;
							
							if(!isset ($_SESSION['digitaliagg'])){
								
								echo 
									'<form action="modifica_elaborazione.php" method="POST">
										<input id="bottone-rosa" type="submit" name="aggiungi3" value="Modifica">
									</form>'
								;
							}
							
							else{
								/*COMPETENZE - AGGIUNGI*/
								if($_SESSION['digitaliagg']=="agg"){
									
									unset($_SESSION["digitaliagg"]);
									
									
									if(isset ($_SESSION["digitali"])){
										if($_SESSION["digitali"]=="fail"){
											echo "<font color= 'red'>Hai compilato male il form, ricordati di compilare tutti i campi obbligatori.</font><br>";
											unset($_SESSION["digitali"]);
										}
									}
									
									echo 
										'<form action="modifica_elaborazione.php" method="POST">
											<p>Una volta aggiunte le tue competenze potrai modificarle in seguito, tutti i campi sono obbligatori.<br>
													Livelli: Utente base  -  Utente intermedio  -  Utente avanzato</p><br>
												
											<table>
												<tr>
													<tr>
														<td>Elaborazione delle informazioni</td>
														<td>Comunicazione</td>
														<td>Creazione dei contenuti</td>
														<td>Sicurezza</td>
														<td>Risoluzione dei problemi</td>
													<tr>
													<tr>
														<td>
															<select name="elaborazione">
																<option value="null">-</option>
																<option value="Utente base">Utente base</option>
																<option value="Utente intermedio">Utente intermedio</option>
																<option value="Utente avanzato">Utente avanzato</option>
															</select>
														</td>
														<td>
															<select name="comunicazione">
																<option value="null">-</option>
																<option value="Utente base">Utente base</option>
																<option value="Utente intermedio">Utente intermedio</option>
																<option value="Utente avanzato">Utente avanzato</option>
															</select>
														</td>
														<td>
															<select name="creazione">
																<option value="null">-</option>
																<option value="Utente base">Utente base</option>
																<option value="Utente intermedio">Utente intermedio</option>
																<option value="Utente avanzato">Utente avanzato</option>
															</select>
														</td>
														<td>
															<select name="sicurezza">
																<option value="null">-</option>
																<option value="Utente base">Utente base</option>
																<option value="Utente intermedio">Utente intermedio</option>
																<option value="Utente avanzato">Utente avanzato</option>
															</select>
														</td>
														<td>
															<select name="risoluzione">
																<option value="null">-</option>
																<option value="Utente base">Utente base</option>
																<option value="Utente intermedio">Utente intermedio</option>
																<option value="Utente avanzato">Utente avanzato</option>
															</select>
														</td>
													</tr>
												</table>
											<input id="bottone-rosa" type="submit" name="digitalimod" value="Aggiungi">
										</form><br>'
									;
								}
							}
						}
						
					?>
			</div>	
		</div>

		<!--COPYRIGHT-->
		<p class="copyright-login"> Creato da Martina S. </p>
	</body>
</html>