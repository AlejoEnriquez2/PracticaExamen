<!DOCTYPE html>
<html>
	<head>
		<title>Nueva Sucursal</title>
	</head>
	<body>
		<?php
			include '../../config/conexionBD.php';
			$nombre = isset($_POST['nombre']) ? trim($_POST['nombre'], 'utf-8') :null;
			$latitud = isset($_POST['latitud'])? trim($_POST['latitud'], 'utf-8') :null;
			$longitud = isset($_POST['longitud'])? trim($_POST['longitud'], 'utf-8') :null;
				
			date_default_timezone_set("America/Guayaquil");
            $fecha = date('Y-m-d H:i:s', time());
			$sql = "INSERT INTO `tbl_tienda`(`tienda_id`, `tienda_registro`, `tienda_nombre`, `tienda_latitud`, `tienda_longitud`, `tienda_eliminado`) VALUES (0, '$fecha', '$nombre', '-$latitud', '-$longitud', 0)";
			if($conn->query($sql)==TRUE){
    			echo "<p>Se ha insertado correctamente</p>";
    		}else{
    			echo "<p>ERROR".$conn->error."</p>";
    		}
    		$conn->close();
    		echo "<a href='/PracticaExamen/admin/vista/crear_sucursal.php'>Regresar</a>";
		?>
	</body>
</html>