<!DOCTYPE html>
<html>
    <head></head>
    <body>

	    
            <?php   
                include '../../config/conexionBD.php';
                $nombre = $_GET['nombre'];
                $sql = "SELECT * FROM juegos WHERE jue_nombre = '$nombre'";
                $result = $conn->query($sql);
                $u = $result->fetch_assoc();
				$codigo = $u['jue_codigo'];
                $imagen = $u['jue_imagen'];
				
            ?>
			<a href="../pages/juego.php?codigo=<?php echo $codigo ?>"><img width="20%" id="0" class="mySlides" src="../images/games/<?php echo "$imagen"?>"></a>

    
    </body>
</html>
