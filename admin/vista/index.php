<?php 
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
       header("Location: /PracticaExamen/public/vista/login.html");
    }
    if(!isset($_SESSION['rol'])|| $_SESSION['rol'] == 2){
        header("Location: /PracticaExamen/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
    <head>
		<title>MadGames</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="/PracticaExamen/public/images/icono.png">
        <link rel="stylesheet" href="/PracticaExamen/public/estilos/style.css" type="text/css">
		<link rel="stylesheet" href="/PracticaExamen/public/estilos/juegos.css" type="text/css">
		<script type="text/javascript" src="/PracticaExamen/public/javascript/javascript.js"></script>
		<script type="text/javascript" src="/PracticaExamen/public/javascript/tablas.js"></script>
		<?php
			include '../../config/conexionBD.php';
			$sql= "SELECT * FROM juegos WHERE jue_eliminado = '0'";
			$result = $conn->query($sql);
			
		?>
    </head>
    <body>
		<?php
            $codigo = $_GET['codigo'];
        ?>
	<header class="cabecera">
            <a href="/PracticaExamen/public/pages/index.php">
                <div class="logo">
                    <img src="/PracticaExamen/public/images/logo.png">
                    <h2>MadGames</h2>
                </div>
            </a>
            <div class="menu">
                <ul class="navegacion">
                    <li>
                        <a href="/PracticaExamen/public/pages/index.php">Juegos</a>
                        <ul>
                            <li><a href="/PracticaExamen/public/pages/puntaje.php">Mejores&nbsp;Puntuaciones</a></li>
                            <li><a href="/PracticaExamen/public/pages/novedades.php">Novedades</a></li>
                            <li><a href="#">Categorías</a>
                                <ul style="top: 113px">
                                    <li><a href="/PracticaExamen/public/pages/categoria.php?cat=1">Accion</a></li>
                                    <li><a href="/PracticaExamen/public/pages/categoria.php?cat=2">Terror</a></li>
                                    <li><a href="/PracticaExamen/public/pages/categoria.php?cat=3">Deporte</a></li>
                                    <li><a href="/PracticaExamen/public/pages/categoria.php?cat=4">Rol</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/PracticaExamen/public/pages/index.php">Ofertas</a>
                        <ul>
                            <li><a href="/PracticaExamen/public/pages/mejores.php">Mejores</a></li>
                            <li><a href="/PracticaExamen/public/pages/gratis.php">Free2Play</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>About</a>
                        <ul>
                            <li><a href="about.html">Quienes&nbsp;Somos</a></li>
                            <li><a href="contacto.php?codigo=".$codigo>Contacto</a></li>
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
            <button class='boton'><a style="color: white" href=/PracticaExamen/public/controladores/salir.php>Salir</a> 
        </div>
    </header>
	<section class="dos" style="color: white">
		<input  type="text" id="usuario" value="usuarios" hidden>
		<input class="boton" type="button" id="buscar" name="buscar" value="Usuarios" onclick="buscarUsuarios()">
		<br>
		<br>
		<input type="text" id="juego" value="juegos" hidden>
		<input class="boton" type="button" id="buscar" name="buscar" value="Juegos" onclick="buscarJuego()">
		<br>
		<br>
		<input type="text" id="correo" value="correo" hidden>
		<input class="boton" type="button" id="buscar" name="buscar" value="Mensajes" onclick="buscarMensaje()">
		<br>
		<br>
		<div id="tablas"></div>
		<br>
		<br>
	</section>
	<footer class="pie">
        <h2>Universidad Politécnica Salesiana</h2>
        <h4>Desarrollado por: <em> &#8226; David Cornejo &#8226; Alejandro Enríquez &#8226; Paulo Gonzalez &#8226; Angel
                Ruiz &#8226; Evelyn Pintado</em></h4>
        <h6> <sub>&#169;</sub> <em> Todos los derechos reservados</em></h6>
    </footer>
	</body>
</html>

