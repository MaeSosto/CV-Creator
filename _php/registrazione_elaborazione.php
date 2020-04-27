<?php
/*MARTINA SOSTO - TESINA - 5AIN - AS 2016/17 */
	session_start();
	
	//FUNZIONI
	function fun($var){
		$var=str_replace("'","&#39",$var);
		$var=str_replace('"',"&#39",$var);
		$var=str_replace('%',"&#37",$var);
		$var=str_replace('_','&#95',$var);
		$var=str_replace("\\","&#92",$var);
		return $var;
	}

	//PASSAGGIO DEI DATI
	$username=fun($_POST["username"]);
	$password=fun($_POST["password"]);
	$ripetipw=fun($_POST["ripetipw"]);
	$mail=fun($_POST["mail"]);
	$nome=fun($_POST["nome"]);
	$cognome=fun($_POST["cognome"]);
	$luogo=fun($_POST["luogo"]);
	$sesso=fun($_POST["sesso"]);
	$nazionalita=fun($_POST["nazionalita"]);
	$cellulare=fun($_POST["cellulare"]);
	$telefono=fun($_POST["telefono"]);
	$patente=fun($_POST["patente"]);
	$data=$_POST["data"];
	$foto="../uploads/foto.png";

	if(!isset ($_POST["check"])){
		$_SESSION["registrazione"]="privacy";
		header("location: registrazione.php");
		die();
	}
	
	//CONTROLLO SUI DATI
	if(	
		!isset ($_POST["username"]) ||
		!isset ($_POST["password"]) ||
		!isset ($_POST["ripetipw"]) ||
		!isset ($_POST["mail"])    ||
		!isset ($_POST["nome"])		||
		!isset ($_POST["cognome"])	||
		!isset ($_POST["luogo"])||
		!isset ($_POST["sesso"])||
		!isset ($_POST["nazionalita"])	||
		!isset ($_POST["cellulare"])	||
		!isset ($_POST["data"])	||
		strlen($username) == 0 ||
		strlen($nome) == 0 ||
		strlen($cognome) == 0 ||
		strlen($password) < 8 ||
		strlen($ripetipw) == 0 ||
		strlen($luogo) == 0 ||
		strlen($mail) 	  == 0 ||
		strlen($nazionalita)== 0 ||
		strlen($cellulare) 	  == 0 ||
		$password!=$ripetipw){
			
		$_SESSION["registrazione"]="wrong";
		header("location: registrazione.php");
		die();
		
	}
		
		
	require_once('Connessione.php');
	
	$query=$conn->prepare("SELECT * FROM utenti WHERE (username ='$username') OR (mail='$mail')");
	$query->execute();
	$count=$query->rowCount();
	if($count){
		$_SESSION["registrazione"]="fallito";
		header("location: registrazione.php");
        die();	
	}

	$password=md5($password);
	$usernamemd5=md5($username);
	
	$sql = "INSERT INTO utenti(username, usernamemd5, password, mail, nome, cognome, data, luogo, sesso, nazionalita, numtel, numtel2, patente, foto) VALUES ('$username', '$usernamemd5', '$password', '$mail', '$nome', '$cognome', '$data', '$luogo', '$sesso', '$nazionalita', '$cellulare', '$telefono', '$patente', '$foto')";
    $conn->exec($sql);

	$_SESSION["registrazione"]="successo";
		header("location: login.php");
        die();	
?>