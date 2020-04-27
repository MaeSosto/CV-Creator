<?php
	/*MARTINA SOSTO - TESINA - 5AIN - AS 2016/17 */
	require_once('Connessione.php');
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

	$username=fun($_POST['username']);
	$password=fun(md5($_POST['password']));
	
	//CONTROLLO
	$query=$conn->prepare("SELECT * FROM utenti WHERE (username ='$username') AND (password = '$password')");
	$query->execute();
	$count=$query->rowCount();
	$data=$query->fetch(PDO::FETCH_OBJ);
				
	if($count){
			
		$_SESSION['username']=$data->username;
		$_SESSION['usernamemd5']=$data->usernamemd5;
		$_SESSION['mail']=$data->mail;
		$_SESSION['nome']=$data->nome;
		$_SESSION['cognome']=$data->cognome;
		$_SESSION['luogo']=$data->luogo;
		$_SESSION['sesso']=$data->sesso;
		$_SESSION['nazionalita']=$data->nazionalita;
		$_SESSION['numtel']=$data->numtel;
		$_SESSION['numtel2']=$data->numtel2;
		$_SESSION['patente']=$data->patente;
		$_SESSION['data']=$data->data;
		$_SESSION['foto']=$data->foto;
		$_SESSION['aspirazioni']=$data->aspirazioni;
		$_SESSION['hobby']=$data->hobby;
		$_SESSION['madre']=$data->madre;
		header("location: home.php");
	}

	else{
		$_SESSION["login"]="errato";
		header("location: login.php");
		die();
	}
?>