<?php
	$servername="www.db4free.net";
	$username="adminhipermedial";
	$password="Hipermedial7432";
	$dbname="base_correo";

	//Conexión
	$conn=new mysqli($servername, $username,  $password, $dbname);
	$conn->set_charset("utf8");

	//Check
	if($conn->connect_error){
		die("Conexión Fallida!".$conn->connect_error);
	}else{
		//echo "Conectado con PHP";
	}
?>