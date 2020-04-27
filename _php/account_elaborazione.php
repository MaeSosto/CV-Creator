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

	/*MODIFICA ASPIRAZIONI*/
	if(isset ($_POST['aggiungiaspirazioni'])){
		
		$aspirazioni=fun($_POST['aspirazioni']);

		if(strlen($aspirazioni)== 0 || !isset($_POST['aspirazioni'])){
			$_SESSION["modifica5"]="errore";
			header("location: account.php");
			die();	
		}

		else{
			require_once('Connessione.php');
	
			$query=$conn->prepare("UPDATE utenti SET aspirazioni='$aspirazioni' WHERE (username ='$_SESSION[username]')");
			$query->execute();

			$_SESSION['aspirazioni']=$aspirazioni;
			$_SESSION["modifica5"]="successo";
			header("location: account.php");
			die();	
		}	
	}

	if(isset ($_POST['aspirazionibottone'])){
		$_SESSION['aspirazionimod']=mod;
		header("location: account.php");
		die();	
	}

	/*MODIFICA HOBBY*/
	if(isset ($_POST['aggiungihobby'])){
		$hobby=fun($_POST['hobby']);


		if(strlen($hobby)== 0 || !isset($_POST['hobby'])){
			$_SESSION["modifica5"]="errore";
			header("location: account.php");
			die();	
		}

		else{
			require_once('Connessione.php');
	
			$query=$conn->prepare("UPDATE utenti SET hobby='$hobby' WHERE (username ='$_SESSION[username]')");
			$query->execute();

			$_SESSION['hobby']=$hobby;
			$_SESSION["modifica5"]="successo";
			header("location: account.php");
			die();	
		}	
	}

	if(isset ($_POST['hobbybottone'])){
		$_SESSION['hobbymod']=mod;
		header("location: account.php");
		die();	
	}


	/*MODIFICA PASSWORD*/
	if(
		isset ($_POST['old']) &&
		isset ($_POST['newpw']) &&
		isset ($_POST['newpwagain'])){
		
		$old=fun($_POST['old']);
		$newpw=fun($_POST['newpw']);
		$newpwagain=fun($_POST['newpwagain']);
	
		require_once('Connessione.php');
	
		$query=$conn->prepare("SELECT * FROM utenti WHERE (username ='$_SESSION[username]')");
		$query->execute();
		$data=$query->fetch(PDO::FETCH_OBJ);
		
		if($data->password==md5($old) && $newpw==$newpwagain && strlen($newpw)> 8){
			$newpw=md5($newpw);
			$query1=$conn->prepare("UPDATE utenti SET password='$newpw' WHERE username ='$_SESSION[username]'");
			$query1->execute();
			
			$_SESSION["modifica1"]="successo";
			header("location: login.php");
			die(); 
		}

		$_SESSION["modifica1"]="errato";
		header("location: account.php");
		die();	
	}	

	/*MODIFICA USERNAME*/
	if(isset ($_POST['username'])){
		$username=fun($_POST['username']);
	
		require_once('Connessione.php');
	
		$query=$conn->prepare("SELECT * FROM utenti WHERE (username ='$username')");
		$query->execute();
		$count=$query->rowCount();
		if($count || strlen ($username)==0 ){
			$_SESSION["modifica2"]="errato";
			header("location: account.php");
			die();		
		}

		else{
			$usernamemd5=md5($username);
			$query1=$conn->prepare("UPDATE utenti SET username='$username', usernamemd5='$usernamemd5' WHERE username ='$_SESSION[username]'");
			$query1->execute();	
			$_SESSION['username']=$username;
			$_SESSION["modifica2"]="successo";
			header("location: account.php");
			die();	
		}
	}

	/*MODIFICA MAIL*/
	if(isset ($_POST['mail'])){
		$mail=fun($_POST['mail']);
	
		require_once('Connessione.php');
	
		$query=$conn->prepare("SELECT * FROM utenti WHERE (mail ='$mail')");
		$query->execute();
		$count=$query->rowCount();
		if($count || strlen($mail)==0){
			$_SESSION["modifica3"]="errato";
			header("location: account.php");
			die();	
		}

		else{
			$query1=$conn->prepare("UPDATE utenti SET mail='$mail' WHERE username ='$_SESSION[username]'");
			$query1->execute();
			$_SESSION['mail']=$mail;
			$_SESSION["modifica3"]="successo";
			header("location: account.php");
			die();	
		}		
	}

	

	//MODIFICA FOTO
	if(!isset($_POST["eliminafoto"])) {
		$target_dir = "../uploads/";
		$target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
		$uploadOk = 1;
		$imageFileType = pathinfo($target_file,PATHINFO_EXTENSION);

		if(isset($_POST["submitfoto"])) {
			$check = getimagesize($_FILES["fileToUpload"]["tmp_name"]);
			if($check !== false) {
				$uploadOk = 1;
			}

			else {
				$uploadOk = 0;
				$_SESSION["modifica4"]="nofoto";
				header("location: account.php");
				die();
			}
		}

		if (file_exists($target_file)) {
			$uploadOk = 0;
			$_SESSION["modifica4"]="esiste";
			header("location: account.php");
			die();
		}

		if ($_FILES["fileToUpload"]["size"] > 5000000) {
			$uploadOk = 0;
			$_SESSION["modifica4"]="dimensione";
			header("location: account.php");
			die();
		}


		if ($uploadOk == 0) {
			$_SESSION["modifica4"]="errore";
			header("location: account.php");
			die();
		} 

		else {
			if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
		
				require_once('Connessione.php');
		
				$query1=$conn->prepare("UPDATE utenti SET foto='$target_file' WHERE username ='$_SESSION[username]'");
				$query1->execute();	
		
				$_SESSION['foto']=$target_file;
				$_SESSION["modifica4"]="successo";
				header("location: account.php");
				die();
			}

			else {
				$_SESSION["modifica4"]="errore";
				header("location: account.php");
				die();
			}
		}
	}

	//ELIMINA FOTO
	else{
		require_once('Connessione.php');
		
		$foto="../uploads/foto.png";
		
		$query1=$conn->prepare("UPDATE utenti SET foto='$foto' WHERE username ='$username'");
		$query1->execute();	
		
		$_SESSION['foto']=$foto;
		$_SESSION["modifica4"]="successo";
		header("location: account.php");
		die();
	}
?>