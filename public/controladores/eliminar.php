<!DOCTYPE html>
<html>
<head>
	<title>Eliminar</title>
		<meta charset="utf-8">
		<link rel="shortcut icon" href="../images/icono.png">
    </head>
    <body>
        <?php
            include '../../config/conexionBD.php';
            $codigo = $_GET['codigo'];
            
            date_default_timezone_set("America/Guayaquil");
            $fecha = date('Y-m-d H:i:s', time());
            $sql = "UPDATE juegos SET jue_eliminado = 1 WHERE jue_codigo = '$codigo'";
            $result = $conn->query($sql);
            if($result){
                echo "Eliminado Correctamente";
            }else {
                echo "<p>ERROR".$conn->error."</p>";
            }
			echo "<br><a href='../pages/index.php'>Regresar</a>";
        ?>
    </body>
</html>