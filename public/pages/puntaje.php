﻿<?php 
    session_start();
    //if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
      // header("Location: /PracticaExamen/public/vista/login.html");
    //}
    //if(!isset($_SESSION['rol'])|| $_SESSION['rol'] == 2){
        //header("Location: /PracticaExamen/public/vista/login.html");
    //}
?>
<!DOCTYPE html>
<html>
    <head>
		<title>Mejores Puntajes</title>
        <link rel="shortcut icon" href="/PracticaExamen/public/images/icono.png">
        <link rel="stylesheet" href="/PracticaExamen/public/estilos/style.css" type="text/css">
        <link rel="stylesheet" href="/PracticaExamen/public/estilos/juegos.css" type="text/css">
        <script type="text/javascript" src="/PracticaExamen/public/javascript/javascript.js"></script>
        <script type="text/javascript" src="/PracticaExamen/public/javascript/juego.js"></script>
    </head>
    <body>
    <header class="cabecera">
            <a href="/PracticaExamen/public/pages/index.php">
                <div class="logo">
                    <img src="../images/logo.PNG">
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
                            <li><a href="/PracticaExamen/public/pages/about.php">Quienes&nbsp;Somos</a></li>
                            <li><a href="/PracticaExamen/public/pages/contacto.php">Contacto</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="/PracticaExamen/user/vista/carro_compras.php">Carrito</a></li>
                <li>
                    <input class="busqueda" type="text" id="juego" value="">
                    <input class="boton" type="button" id="buscar" name="buscar" value="Buscar" onclick="buscar()">
                    <!--<img class="iB" src="../images/search.png">-->
                </li>
            </ul>
        </div>
            <div class="cuenta">
                <?php
                if(isset($_SESSION['isLogged']) === FALSE){
                    echo "<button class='boton'><a style='color: white' href=/PracticaExamen/public/vista/login.html>Login</a>";
                }else {
                    echo "<button class='boton'><a style='color: white' href=/PracticaExamen/admin/vista/index.php>Cuenta</a>";
                }		
		?>
            </div>
        </header>
        <section class="dos">
            <center><div id="informacion">
                <a href="index.html"><img width="25%" class="mySlides" src="../images/icono.png"></a>
                <a href="index.html"><img width="50%" id="0" class="mySlides" src=""></a>
                <a href="index.html"><img width="50%" id="1" class="mySlides" src=""></a>
                <a href="index.html"><img width="50%" id="2" class="mySlides" src=""></a>
                <a href="index.html"><img width="50%" id="3" class="mySlides" src=""></a>
                <a href="index.html"><img width="50%" id="4" class="mySlides" src=""></a>
                <button id="izq" onclick="plusDivs(-1)">Anterior</button>
			    <button id="center" onclick="reiniciar()">Reiniciar</button>
			    <button id="der" onclick="plusDivs(+1)">Siguiente</button>
            </div></center>
            <div class="col2">
                <h1 style="color: white">Mejores Puntajes</h1>
				<?php
					include '../../config/conexionBD.php';
					$sql = "SELECT * FROM juegos WHERE jue_eliminado = 0 ORDER BY jue_nota DESC LIMIT 8";
					$result = $conn->query($sql);
                    if($result->num_rows > 0){
                        while (($u = $result->fetch_assoc())){
                            echo "<div class='divs'><a href='juego.php?codigo=".$u['jue_codigo']."'><img width='25%' src='../images/games/".$u['jue_imagen']."'></a><h3 style='color: white'>".$u['jue_nota']."&nbsp&nbsp;Pts</h3></div>";
                        }
                    }

				?>
            </div>
            
        </section>
        <footer class="pie">
            <h2>Universidad Politécnica Salesiana</h2>
            <h4>Desarrollado por: <em> &#8226; David Cornejo &#8226; Alejandro Enríquez &#8226; Paulo Gonzalez &#8226; Angel Ruiz &#8226; Evelyn Pintado</em></h4>
            <h6> <sub>&#169;</sub> <em> Todos los derechos reservados</em></h6>
        </footer>
    </body>
</html>