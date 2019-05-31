<!DOCTYPE html>
<html>
    <head>
		<title>MadGames</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="../../public/images/icono.png">
        <link rel="stylesheet" href="../../public/estilos/style.css" type="text/css">
		<link rel="stylesheet" href="/PracticaExamen/public/estilos/juegos.css" type="text/css">
        <script type="text/javascript" src="../javascript/javascript.js"></script>
		<?php
			include '../../config/conexionBD.php';
			$sql= "SELECT * FROM juegos WHERE jue_eliminado = '0'";
			$result = $conn->query($sql);
			
		?>
    </head>
    <body>
        <header class="cabecera">
            <a href="index.php">
                <div class="logo">
                    <img src="../../public/images/logo.PNG">
                    <h2>MadGames</h2>
                </div>
            </a>
            <div class="menu">
                <ul class="navegacion">
                    <li>
                        <a href="index.php">Juegos</a>
                        <ul>
                            <li><a href="puntaje.php">Mejores</a></li>
                            <li><a href="novedades.php">Novedades</a></li>
                            <li><a href="#">Categorías</a>
                                <ul style="top: 113px">
                                    <li><a href="categoria.php?cat=1">Accion</a></li>
                                    <li><a href="categoria.php?cat=2">Terror</a></li>
                                    <li><a href="categoria.php?cat=3">Deporte</a></li>
                                    <li><a href="categoria.php?cat=4">Rol</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="index.html">Ofertas</a>
                        <ul>
                            <li><a href="mejores.php">Mejores</a></li>
                            <li><a href="gratis.php">Free2Play</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>About</a>
                        <ul>
                            <li><a href="about.html">Quienes&nbsp;Somos</a></li>
                            <li><a href="contacto.php">Contacto</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="carrito.html">Carrito</a></li>
                <li>
                    <input class="busqueda" type="text" id="juego" value="">
                    <input class="boton" type="button" id="buscar" name="buscar" value="Buscar" onclick="buscar()">
                    <!--<img class="iB" src="../images/search.png">-->
                </li>
            </ul>
        </div>
			<div class="cuenta">
            <button class='boton'><a style="color: white" href=../../public/controladores/salir.php>Salir</a> 
        </div>
    </header>
	<section class="dos" style="color: white">
		
	 <table style="width:100%">
		<tr>
			<th>Cedula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Correo</th>
			<th>Fecha Nacimiento</th>
		</tr>
     
     
	 <?php
	 include '../../config/conexionBD.php';
	 $sql = "SELECT * FROM usuarios WHERE usu_eliminado='N'";
	 $result = $conn->query($sql);

	 if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
	 echo "<tr>";
	 echo " <td>" . $row["usu_cedula"] . "</td>";
	 echo " <td>" . $row['usu_nombres'] ."</td>";
	 echo " <td>" . $row['usu_apellidos'] . "</td>";
	 echo " <td>" . $row['usu_correo'] . "</td>";
	 echo " <td>" . $row['usu_fecha_nac'] . "</td>";
	}
		} else {
		echo "<tr>";
		echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
		echo "</tr>";
		}
	 $conn->close();
	 ?>
	 </table>
	
	<h3>Juegos Registrados</h3>
	
	<table style="width:100%">
		<tr>
			<th>Titulo</th>
			<th>Imagen</th>
			<th>Precio</th>
			<th>Fecha</th>
		</tr>
     
     
	 <?php
	 include '../../config/conexionBD.php';
	 $sql = "SELECT * FROM juegos WHERE jue_eliminado = 0";
	 $result = $conn->query($sql);

	 if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
	 echo "<tr>";
	 echo " <td>" . $row["jue_nombre"] . "</td>";
	 echo " <td>" . $row['jue_imagen'] . "</td>";
	 echo " <td>" . $row['jue_precio'] . "</td>";
	 echo " <td>" . $row['jue_fecha'] . "</td>";
	 echo " <td> <a style='color:white' href='/PracticaExamen/public/controladores/eliminar.php?codigo=" . $row['jue_codigo'] . "'>Eliminar</a> </td>";
	 echo " <td> <a style='color:white' href='/PracticaExamen/public/pages/editar_juego.php?codigo=" . $row['jue_codigo'] . "'>Modificar</a> </td>";
	 echo "</tr>";
	}
		} else {
		echo "<tr>";
		echo " <td colspan='7'> No existen juegos registradas en el sistema </td>";
		echo "</tr>";
		}
	 $conn->close();
	 ?>
	 </table>
	
	<h3>Mensajes</h3>
	
	<table style="width:100%">
	<tr>
	<th>Fecha</th>
	<th>Remite</th>
	<th>Destinatario</th>
	<th>Asunto</th>
	<th>Mensaje</th>
	</tr>
     
     
	 <?php
	 include '../../config/conexionBD.php';
	 $sql = "SELECT * FROM correo";
	 $result = $conn->query($sql);

	 if ($result->num_rows > 0) {

	while($row = $result->fetch_assoc()) {
	 echo "<tr>";
	 echo " <td>" . $row["cor_fecha_envio"] . "</td>";
	 echo " <td>" . $row['cor_usu_remite'] ."</td>";
	 echo " <td>" . $row['cor_usu_destino'] . "</td>";
	 echo " <td>" . $row['cor_asunto'] . "</td>";
	 echo " <td>" . $row['cor_mensaje'] . "</td>";
	 echo "</tr>";
	}
		} else {
		echo "<tr>";
		echo " <td colspan='7'> No existen mensajes recibidos </td>";
		echo "</tr>";
		}
	 $conn->close();
	 ?>
	 </table>
	</section>
	<footer class="pie">
        <h2>Universidad Politécnica Salesiana</h2>
        <h4>Desarrollado por: <em> &#8226; David Cornejo &#8226; Alejandro Enríquez &#8226; Paulo Gonzalez &#8226; Angel
                Ruiz &#8226; Evelyn Pintado</em></h4>
        <h6> <sub>&#169;</sub> <em> Todos los derechos reservados</em></h6>
    </footer>
	</body>
</html>

