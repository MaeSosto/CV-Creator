<?php
/*MARTINA SOSTO - TESINA - 5AIN - AS 2016/17 */
	session_start();
	$username=$_SESSION['username'];
	
	//FUNZIONI
	function fun($var){
		$var=str_replace("'","&#39",$var);
		$var=str_replace('"',"&#39",$var);
		$var=str_replace('%',"&#37",$var);
		$var=str_replace('_','&#95',$var);
		$var=str_replace("\\","&#92",$var);
		return $var;
	}

	/*CONTROLLI PER IL LAVORO*/	
	if(isset ($_POST['aggiungi'])){
		$_SESSION["lavoroagg"]="agg";
		header("location: modifica.php");
		die();	
	}

	if(isset ($_POST['elimina'])){
		$_SESSION["lavoroagg"]="eli";
		header("location: modifica.php");
		die();	
	}
	
	if(isset ($_POST['modifica'])){
		$_SESSION["lavoroagg"]="mod";
		header("location: modifica.php");
		die();	
	}
	
	/*CONTROLLI PER IL LAVORO - AGGIUNGI LAVORO*/		
	if(isset ($_POST['lavoroagg'])){
		$nome_lavoro=fun($_POST["nome_lavoro"]);
		$luogo_lavoro=fun($_POST["luogo_lavoro"]);
		$descrizione_lavoro=fun($_POST["descrizione_lavoro"]);
		$datainizio_lavoro=fun($_POST["datainizio_lavoro"]);
		$datafine_lavoro=fun($_POST["datafine_lavoro"]);
		$settore_lavoro=fun($_POST["settore_lavoro"]);
		$username=$_SESSION["username"];
			

		if(	
		!isset ($_POST["nome_lavoro"]) ||
		!isset ($_POST["luogo_lavoro"]) ||
		!isset ($_POST["descrizione_lavoro"]) ||
		!isset ($_POST["datainizio_lavoro"]) ||
		!isset ($_POST["datafine_lavoro"]) ||
		strlen($nome_lavoro) == 0 ||
		strlen($luogo_lavoro) == 0 ||
		strlen($descrizione_lavoro) ==0 || 
		strlen($datainizio_lavoro) ==0 ||
		strlen($datafine_lavoro) ==0){
			
			$_SESSION["lavoro"]="fail";
			$_SESSION['lavoroagg']="agg";
			header("location: modifica.php");
			die();
		}

		if($datainizio_lavoro>date("Y-m-d") || $datainizio_lavoro>$datafine_lavoro){
			$_SESSION["lavoro"]="date";
			$_SESSION['lavoroagg']="agg";
			header("location: modifica.php");
			die();
		}

		else{
			if($datafine_lavoro==date("Y-m-d")){
				$datafine_lavoro="corrente";
			}

			require_once('Connessione.php');
			$sql = "INSERT INTO lavoro(username, nome, luogo, descrizione, datainizio, datafine, settore) VALUES ('$username', '$nome_lavoro', '$luogo_lavoro', '$descrizione_lavoro', '$datainizio_lavoro', '$datafine_lavoro', '$settore_lavoro')";
			$conn->exec($sql);

			$_SESSION["lavoro"]="successo";
			header("location: modifica.php");
			die();	
		}
	}
	
	/*CONTROLLI PER IL LAVORO - ELIMINA LAVORO*/
	if(isset ($_POST['lavoroeli'])){
		
		require_once('Connessione.php');
		$eliminazione=fun($_POST['eliminazione']);

		if(!isset ($_POST['eliminazione']) || $eliminazione=="null"){
			$_SESSION["lavoroagg"]="eli";
			$_SESSION['lavoro']="eli";
			header("location: modifica.php");
			die();
		}
		
		$query=$conn->prepare("DELETE FROM lavoro WHERE nome='$eliminazione'");
		$query->execute();
		
		$_SESSION["lavoro"]="eliminato";
		header("location: modifica.php");
		die();	
	}

	/*CONTROLLI PER IL LAVORO - MODIFICA LAVORO - BOTTONE*/	
	if(isset ($_POST['lavoromod'])){
		$nomeform=fun($_POST['nomeform']);
		$_SESSION['nomeform']=$nomeform;
		
		if($nomeform=="null"){
			$_SESSION["lavoro"]="fail";
			$_SESSION['lavoroagg']="mod";
			header("location: modifica.php");
			die();
		}

		else{
			require_once('Connessione.php');

			$query=$conn->prepare("SELECT * FROM lavoro WHERE (nome ='$nomeform') AND (username = '$username')");
			$query->execute();
			$data=$query->fetch(PDO::FETCH_OBJ);


			if($data->datafine=="corrente")
				$datafine_lavoro=date("Y-m-d");
			else 
				$datafine_lavoro=$data->datafine;

			$_SESSION['nome_lavoro']=$data->nome;
			$_SESSION['luogo_lavoro']=$data->luogo;
			$_SESSION['descrizione_lavoro']=$data->descrizione;
			$_SESSION['datainizio_lavoro']=$data->datainizio;
			$_SESSION['datafine_lavoro']=$datafine_lavoro;
			$_SESSION['settore_lavoro']=$data->settore;
			
			
			$_SESSION['lavoroagg']="mod1";
			header("location: modifica.php");
			die();
		}
	}



	/*CONTROLLI PER IL LAVORO - MODIFICA LAVORO - FORM*/
	if(isset ($_POST['lavoromodform'])){
		require_once('Connessione.php');


		$nome_lavoro=fun($_POST["nome_lavoro"]);
		$luogo_lavoro=fun($_POST["luogo_lavoro"]);
		$descrizione_lavoro=fun($_POST["descrizione_lavoro"]);
		$datainizio_lavoro=fun($_POST["datainizio_lavoro"]);
		$datafine_lavoro=fun($_POST["datafine_lavoro"]);
		$settore_lavoro=fun($_POST["settore_lavoro"]);
			

		if(	
		!isset ($_POST["nome_lavoro"]) ||
		!isset ($_POST["luogo_lavoro"]) ||
		!isset ($_POST["descrizione_lavoro"]) ||
		!isset ($_POST["datainizio_lavoro"]) ||
		!isset ($_POST["datafine_lavoro"]) ||
		strlen($nome_lavoro) == 0 ||
		strlen($luogo_lavoro) == 0 ||
		strlen($descrizione_lavoro) ==0 || 
		strlen($datainizio_lavoro) ==0 ||
		strlen($datafine_lavoro) ==0){
			
			$_SESSION["lavoro"]="fail";
			$_SESSION['lavoroagg']="mod1";
			header("location: modifica.php");
			die();
		}

		if($datainizio_lavoro>date("Y-m-d") || $datainizio_lavoro>$datafine_lavoro){
			$_SESSION["lavoro"]="date";
			$_SESSION['lavoroagg']="mod1";
			header("location: modifica.php");
			die();
		}

		else{
			if($datafine_lavoro==date("Y-m-d"))
			$datafine_lavoro="corrente";
		}	

		$nomeform=$_SESSION['nomeform'];
		$sql = "UPDATE lavoro SET nome='$nome_lavoro', luogo='$luogo_lavoro', descrizione='$descrizione_lavoro', datainizio='$datainizio_lavoro', datafine='$datafine_lavoro', settore='$settore_lavoro' WHERE username = '$username' AND nome='$nomeform'";
		$conn->exec($sql);

		unset($_SESSION['nomeform']);
		$_SESSION["lavoro"]="cambiato";
		header("location: modifica.php");
		die();	
	}

	/*FORMAZIONE---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	
	
	if(isset ($_POST['aggiungi1'])){
		$_SESSION["formazioneagg"]="agg";
		header("location: modifica.php");
		die();	
	}

	if(isset ($_POST['elimina1'])){
		$_SESSION["formazioneagg"]="eli";
		header("location: modifica.php");
		die();	
	}
	
	if(isset ($_POST['modifica1'])){
		$_SESSION["formazioneagg"]="mod";
		header("location: modifica.php");
		die();	
	}
	
	/*CONTROLLI PER LA FORMAZIONE - AGGIUNGI FORMAZIONE*/	
	if(isset ($_POST['formazioneagg'])){
		$nome_formazione=fun($_POST["nome_formazione"]);
		$luogo_formazione=fun($_POST["luogo_formazione"]);
		$descrizione_formazione=fun($_POST["descrizione_formazione"]);
		$datainizio_formazione=fun($_POST["datainizio_formazione"]);
		$datafine_formazione=fun($_POST["datafine_formazione"]);
		$username=$_SESSION["username"];
			

		if(	
		!isset ($_POST["nome_formazione"]) ||
		!isset ($_POST["luogo_formazione"]) ||
		!isset ($_POST["descrizione_formazione"]) ||
		!isset ($_POST["datainizio_formazione"]) ||
		!isset ($_POST["datafine_formazione"]) ||
		strlen($nome_formazione) == 0 ||
		strlen($luogo_formazione) == 0 ||
		strlen($descrizione_formazione) ==0 ||
		strlen($datainizio_formazione)==0 ||
		strlen($datafine_formazione)==0){
			
			$_SESSION["formazione"]="fail";
			$_SESSION['formazioneagg']="agg";
			header("location: modifica.php");
			die();
		}

		if($datainizio_formazione>date("Y-m-d") || $datainizio_formazione>$datafine_formazione){
			$_SESSION["formazione"]="date";
			$_SESSION['formazioneagg']="agg";
			header("location: modifica.php");
			die();
		}

		else{
			if($datafine_formazione==date("Y-m-d")){
				$datafine_formazione="corrente";
			}

			require_once('Connessione.php');
			$sql = "INSERT INTO formazione(username, nome, luogo, descrizione, datainizio, datafine) VALUES ('$username', '$nome_formazione', '$luogo_formazione', '$descrizione_formazione', '$datainizio_formazione', '$datafine_formazione')";
			$conn->exec($sql);

			$_SESSION["formazione"]="successo";
			header("location: modifica.php");
			die();	
		}
	}
	
		/*CONTROLLI PER LA FORMAZIONE - ELIMINA FORMAZIONE*/
	if(isset ($_POST['formazioneeli'])){
		
		require_once('Connessione.php');
		$eliminazione=fun($_POST['eliminazione']);

		if(!isset ($_POST['eliminazione']) || $eliminazione=="null"){
			$_SESSION["formazioneagg"]="eli";
			$_SESSION['formazione']="eli";
			header("location: modifica.php");
			die();
		}
		
		$query=$conn->prepare("DELETE FROM formazione WHERE nome='$eliminazione'");
		$query->execute();
		
		$_SESSION["formazione"]="eliminato";
		header("location: modifica.php");
		die();	
	}
	
	/*CONTROLLI PER LA FORMAZIONE - MODIFICA FORMAZIONE - BOTTONE*/
	if(isset ($_POST['formazionemod'])){
		$nomeform=fun($_POST['nomeform']);
		$_SESSION['nomeform']=$nomeform;
		
		if($nomeform=="null"){
			$_SESSION["formazione"]="fail";
			$_SESSION['formazioneagg']="mod";
			header("location: modifica.php");
			die();
		}

		else{
			require_once('Connessione.php');

			$query=$conn->prepare("SELECT * FROM formazione WHERE (nome ='$nomeform') AND (username = '$username')");
			$query->execute();
			$data=$query->fetch(PDO::FETCH_OBJ);

			if($data->datafine=="corrente")
				$datafine_formazione=date("Y-m-d");
			else 
				$datafine_formazione=$data->datafine;

			$_SESSION['nome_formazione']=$data->nome;
			$_SESSION['luogo_formazione']=$data->luogo;
			$_SESSION['descrizione_formazione']=$data->descrizione;
			$_SESSION['datainizio_formazione']=$data->datainizio;
			$_SESSION['datafine_lavoro']=$datafine_formazione;
			
			
			$_SESSION['formazioneagg']="mod1";
			header("location: modifica.php");
			die();
		}
	}

	/*CONTROLLI PER LA FORMAZIONE - MODIFICA FORMAZIONE - FORM*/
	if(isset ($_POST['formazionemodform'])){
		require_once('Connessione.php');

		$nome_formazione=fun($_POST["nome_formazione"]);
		$luogo_formazione=fun($_POST["luogo_formazione"]);
		$descrizione_formazione=fun($_POST["descrizione_formazione"]);
		$datainizio_formazione=fun($_POST["datainizio_formazione"]);
		$datafine_formazione=fun($_POST["datafine_formazione"]);
			

		if(	
		!isset ($_POST["nome_formazione"]) ||
		!isset ($_POST["luogo_formazione"]) ||
		!isset ($_POST["descrizione_formazione"]) ||
		!isset ($_POST["datainizio_formazione"]) ||
		!isset ($_POST["datafine_formazione"]) ||
		strlen($nome_formazione) == 0 ||
		strlen($luogo_formazione) == 0 ||
		strlen($descrizione_formazione) ==0 ||
		strlen($datainizio_formazione)==0 ||
		strlen($datafine_formazione)==0){
			
			$_SESSION["formazione"]="fail";
			$_SESSION['formazioneagg']="mod1";
			header("location: modifica.php");
			die();
		}

		if($datainizio_formazione>date("Y-m-d") || $datainizio_formazione>$datafine_formazione){
			$_SESSION["formazione"]="date";
			$_SESSION['formazioneagg']="mod1";
			header("location: modifica.php");
			die();
		}

		else{
			if($datafine_formazione==date("Y-m-d")){
				$datafine_formazione="corrente";
			}
		}
		
		$nomeform=$_SESSION['nomeform'];
		$sql = "UPDATE formazione SET nome='$nome_formazione', luogo='$luogo_formazione', descrizione='$descrizione_formazione', datainizio='$datainizio_formazione', datafine='$datafine_formazione' WHERE username = '$username' AND nome='$nomeform' ";
		$conn->exec($sql);
	
		unset($_SESSION['nomeform']);
		$_SESSION["formazione"]="cambiato";
		header("location: modifica.php");
		die();	
	}
	/*LINGUA---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	
	
	if(isset ($_POST['aggiungi2'])){
		$_SESSION["linguaagg"]="agg";
		header("location: modifica.php");
		die();	
	}

	if(isset ($_POST['elimina2'])){
		$_SESSION["linguaagg"]="eli";
		header("location: modifica.php");
		die();	
	}


	/*MODIFICA LINGUA MADRE*/
	if(isset ($_POST['aggiungimadre'])){
		
		$madre=fun($_POST['madre']);

		if(strlen($madre)== 0 || !isset($_POST['madre'])){
			$_SESSION["modifica5"]="errore";
			header("location: modifica.php");
			die();	
		}

		else{
			require_once('Connessione.php');
	
			$query=$conn->prepare("UPDATE utenti SET madre='$madre' WHERE (username ='$_SESSION[username]')");
			$query->execute();

			$_SESSION['madre']=$madre;
			$_SESSION["modifica5"]="successo";
			header("location: modifica.php");
			die();	
		}	
	}

	if(isset ($_POST['madrebottone'])){
		$_SESSION['madremod']=mod;
		header("location: modifica.php");
		die();	
	}



	/*CONTROLLI PER LA LINGUA - AGGIUNGI LINGUA*/
	if(isset ($_POST['linguaagg'])){
		
		
		$lingua=fun($_POST['lingua']);
		$ascolto=$_POST['ascolto'];
		$lettura=$_POST['lettura'];
		$interazione=$_POST['interazione'];
		$orale=$_POST['orale'];
		$scritto=$_POST['scritto'];
		$username=$_SESSION["username"];
			

		if(	
		!isset ($_POST["lingua"]) ||
		!isset ($_POST["lettura"]) ||
		!isset ($_POST["ascolto"]) ||
		!isset ($_POST["interazione"]) ||
		!isset ($_POST["orale"]) ||
		!isset ($_POST["scritto"])||
		strlen($lingua) == 0 ||
		$ascolto=="null" ||
		$lettura=="null" ||
		$interazione=="null" ||
		$orale=="null" ||
		$scritto=="null"){
			
			$_SESSION["lingua"]="fail";
			$_SESSION['linguaagg']="agg";
			header("location: modifica.php");
			die();
		}
		else{
		
			require_once('Connessione.php');
			$sql = "INSERT INTO lingua(username, lingua, ascolto, lettura, interazione, orale, scritto) VALUES ('$username', '$lingua', '$ascolto', '$lettura', '$interazione', '$orale', '$scritto')";
			$conn->exec($sql);

			$_SESSION['madre']=$madre;
			$_SESSION["lingua"]="successo";
			header("location: modifica.php");
			die();	
		}
	}
	
	
	/*CONTROLLI PER LA LINGUA - ELIMINA LINGUA*/
	if(isset ($_POST['linguaeli'])){
		
		require_once('Connessione.php');
		$eliminazione=$_POST['eliminazione'];
		
		if(!isset ($_POST['eliminazione']) || $eliminazione=="null"){
			$_SESSION["linguaagg"]="eli";
			$_SESSION['lingua']="eli";
			header("location: modifica.php");
			die();
		}

		$query=$conn->prepare("DELETE FROM lingua WHERE lingua='$eliminazione'");
		$query->execute();
		
		$_SESSION["lingua"]="eliminato";
		header("location: modifica.php");
		die();	
	}
	/*COMPETENZE DIGITALI---------------------------------------------------------------------------------------------------------------------------------------------------------------------------------*/
	
	
	if(isset ($_POST['aggiungi3'])){
		$_SESSION["digitaliagg"]="agg";
		header("location: modifica.php");
		die();	
	}
	
	/*CONTROLLI PER LA COMPETENZE - AGGIUNGI COMPETENZE*/
	if(isset ($_POST['digitaliagg'])){
		
		$elaborazione=$_POST['elaborazione'];
		$comunicazione=$_POST['comunicazione'];
		$creazione=$_POST['creazione'];
		$sicurezza=$_POST['sicurezza'];
		$risoluzione=$_POST['risoluzione'];
		$username=$_SESSION["username"];
			

		if(	
		!isset ($_POST["elaborazione"]) ||
		!isset ($_POST["comunicazione"]) ||
		!isset ($_POST["creazione"]) ||
		!isset ($_POST["sicurezza"]) ||
		!isset ($_POST["risoluzione"]) ||
		$elaborazione=="null" ||
		$comunicazione=="null" ||
		$creazione=="null" ||
		$sicurezza=="null" ||
		$risoluzione=="null" ){
			
			$_SESSION["digitali"]="fail";
			$_SESSION['digitaliagg']="agg";
			header("location: modifica.php");
			die();
		}

		else{
		
			require_once('Connessione.php');
			$sql = "INSERT INTO digitali(username, elaborazione, comunicazione, creazione, sicurezza, risoluzione) VALUES ('$username', '$elaborazione', '$comunicazione', '$creazione', '$sicurezza', '$risoluzione')";
			$conn->exec($sql);
			
			$_SESSION["digitali"]="successo";
			header("location: modifica.php");
			die();	
		}
	}
	
	/*CONTROLLI PER LA COMPETENZE - MODIFICA COMPETENZE*/
	if(isset ($_POST['digitalimod'])){
		
		$elaborazione=$_POST['elaborazione'];
		$comunicazione=$_POST['comunicazione'];
		$creazione=$_POST['creazione'];
		$sicurezza=$_POST['sicurezza'];
		$risoluzione=$_POST['risoluzione'];
		$username=$_SESSION["username"];
			

		if(	
		!isset ($_POST["elaborazione"]) ||
		!isset ($_POST["comunicazione"]) ||
		!isset ($_POST["creazione"]) ||
		!isset ($_POST["sicurezza"]) ||
		!isset ($_POST["risoluzione"]) ||
		$elaborazione=="null" ||
		$comunicazione=="null" ||
		$creazione=="null" ||
		$sicurezza=="null" ||
		$risoluzione=="null" ){
			
			$_SESSION["digitali"]="fail";
			$_SESSION['digitaliagg']="agg";
			header("location: modifica.php");
			die();
		}

		else{
			
			$username=$_SESSION["username"];
			require_once('Connessione.php');
			$sql = "UPDATE digitali SET elaborazione='$elaborazione', comunicazione='$comunicazione', creazione='$creazione', sicurezza='$sicurezza', risoluzione='$risoluzione' WHERE username ='$username'";
			$conn->exec($sql);
			
			$_SESSION["digitali"]="successo";
			header("location: modifica.php");
			die();	
		}
	}
	
	
	
?>