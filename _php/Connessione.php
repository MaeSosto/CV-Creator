<?php
	/*MARTINA SOSTO - TESINA - 5AIN - AS 2016/17 */
	$servername = "localhost";
	$usernamedb = "root";
	$passworddb = "";
	$dbname = "my_cvcreator";

	try {
		$conn = new PDO("mysql:host=$servername;dbname=$dbname", $usernamedb, $passworddb);
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
	
	catch(PDOException $e){
		echo $sql . "<br>" . $e->getMessage();
    }
?>