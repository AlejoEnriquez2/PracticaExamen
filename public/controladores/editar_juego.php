<!DOCTYPE html>
<html>
	<head>
		<title>Editar Juego</title>
	</head>
	<body>
		<?php
			include '../../config/conexionBD.php';
			$codigo = $_GET['codigo'];
			$nombre = isset($_POST['nombre']) ? trim($_POST['nombre'], 'utf-8') :null;
			$descripcion = isset($_POST['descripcion'])? trim($_POST['descripcion'], 'utf-8') :null;
			$sisOperativo = isset($_POST['sisOperativo'])? trim($_POST['sisOperativo'], 'utf-8') :null;
			$procesador = isset($_POST['procesador'])? trim($_POST['procesador'], 'utf-8') :null;
			$ram = isset($_POST['ram'])? trim($_POST['ram'], 'utf-8') :null;
			$precio = isset($_POST['precio'])? trim($_POST['precio'], 'utf-8') :null;
			$almacenamiento = isset($_POST['almacenamiento'])? trim($_POST['almacenamiento'], 'utf-8') :null;
			$categoria = isset($_POST['categoria'])? trim($_POST['categoria'], 'utf-8') :null;
			$descuento = isset($_POST['descuento'])? trim($_POST['descuento'], 'utf-8') :null;
			$nombre_imagen = $_FILES['imagen']['name'];		//Nombre de la imagen
			$tipo_imagen = $_FILES['imagen']['type'];		//Tipo de imagen
			$tamano_imagen = $_FILES['imagen']['size'];		//Tamaño
			$ruta_imagen = $_FILES['imagen']['tmp_name'];		//Ruta
			$carpeta_destino = "../images/games/".$nombre_imagen;
			
			if ($tipo_imagen == ''){
				$sql ="UPDATE `juegos` SET `jue_nombre`='$nombre',`jue_descripcion`='$descripcion', `jue_sistema_operativo`='$sisOperativo',`jue_memoria`='$almacenamiento',`jue_ram`='$ram',`jue_procesador`='$procesador',`jue_precio`=$precio,`jue_categoria`=$categoria,`jue_descuento`=$descuento WHERE jue_codigo = $codigo";
			}else {
				$sql ="UPDATE `juegos` SET `jue_nombre`='$nombre',`jue_descripcion`='$descripcion',`jue_imagen`='$nombre_imagen', `jue_sistema_operativo`='$sisOperativo',`jue_memoria`='$almacenamiento',`jue_ram`='$ram',`jue_procesador`='$procesador',`jue_precio`=$precio,`jue_categoria`=$categoria,`jue_descuento`=$descuento WHERE jue_codigo = $codigo";
				copy($ruta_imagen, $carpeta_destino);
			}
			//$sql = "INSERT INTO `juegos`(`jue_codigo`, `jue_nombre`, `jue_descripcion`, `jue_imagen`, `jue_eliminado`, `jue_sistema_operativo`, `jue_memoria`, `jue_ram`, `jue_procesador`, `jue_precio`, `jue_fecha`, `jue_categoria`, `jue_descuento`, `jue_nota`) VALUES (0, '$nombre', '$descripcion', '$nombre_imagen', 0, '$sisOperativo', '$almacenamiento', '$ram', '$procesador', $precio, CURRENT_TIMESTAMP, $categoria, $descuento,0)";
			if($conn->query($sql)==TRUE){
    			echo "<p>Se ha editado correctamente</p>";
				
				
    		}else{
    			echo "<p>ERROR".$conn->error."</p>";
    		}
    		$conn->close();
    		echo "<a href='../pages/juego.php?codigo=$codigo'>Regresar</a>";
		?>
	</body>
</html>