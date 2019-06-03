<?php
	$servername="a2plcpnl0634.prod.iad2.secureserver.net";
	$username="facquer";
	$password="Angel4317";
	$dbname="madgames";

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