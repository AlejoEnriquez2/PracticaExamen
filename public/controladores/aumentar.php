<!DOCTYPE html>
<html>
	<head>
		<title>Aumentar</title>
	</head>
	<body>
		<?php
			include '../../config/conexionBD.php';
			$codigo = $_GET['codigo'];
			$datos = "SELECT jue_nota FROM `juegos` WHERE jue_codigo= '$codigo'";
			$result = $conn->query($datos);
			$u = $result->fetch_assoc();
			$nota = $u['jue_nota'];
			
			function suma ($nota , $unidad){
				$notaTotal = $nota + $unidad;
				return $notaTotal;
			}
			
			$total = suma($nota, 1);

			$sql = "UPDATE `juegos` SET `jue_nota`= '$total' WHERE jue_codigo='$codigo'";
			if($conn->query($sql)===TRUE){
    			echo "<p>Gracias por votar</p>";
    		}else{
    			echo "<p>ERROR</p>";
    		}
    		$conn->close();
    		header ("location: ../pages/juego.php?codigo=$codigo");
		?>
	</body>
</html>