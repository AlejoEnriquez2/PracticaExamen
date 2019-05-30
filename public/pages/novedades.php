<!DOCTYPE html>
<html>
    <head>
		<title>Nuevos</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="../images/icono.png">
        <link rel="stylesheet" href="../estilos/style.css" type="text/css">
        <script type="text/javascript" src="../javascript/javascript.js"></script>
		<?php
			
		?>
    </head>
    <body>
        <header class="cabecera">
            <a href="index.html">
                <div class="logo">
                    <img src="../images/logo.PNG">
                    <h2>MadGames</h2>
                </div>
            </a>
            <div class="menu">
                <ul class="navegacion">
                    <li>
                        <a href="index.html">Juegos</a>
                        <ul>
                            <li><a href="mejores.php">Mejores</a></li>
                            <li><a href="novedades.php">Novedades</a></li>
                            <li><a href="categorias.html">Categorías</a>
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
                            <li><a href="puntaje.php">Mejor&nbsp;Puntuados</a></li>
                            <li><a href="gratis.php">Free2Play</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>About</a>
                        <ul>
                            <li><a href="about.html">Quienes&nbsp;Somos</a></li>
                            <li><a href="contacto.html">Contacto</a></li>
                        </ul>
                    </li>
                    
                    <li><a href="carrito.html">Carrito</a></li>
                    <!--<li>
                        <a href="perfil.html">Perfil</a>
                        <ul>
                            <li><a href="cuenta.html">Cuenta</a></li>
                            <li><a href="#">Editar</a></li>
                            <li><a href="#">Eliminar</a></li>
                        </ul>
                    </li>-->
                    <li>
                        <input class="busqueda" type="text" id="juego" value="">
                        <input class="boton" type="button" id="nombre" name="buscar" value="Buscar" onclick="buscar()">
                        <!--<img class="iB" src="../images/search.png">-->
                    </li>
                </ul>
            </div>
            <div class="cuenta">
                <button class="boton"><a href="../vista/login.html">Cuenta</a></button>
                <button class="boton">Salir</button>
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
                <h1>Mejores Puntuados</h1>
				<?php
					include '../../config/conexionBD.php';
					$sql = "SELECT * FROM juegos ORDER BY jue_fecha ASC LIMIT 8";
					$result = $conn->query($sql);
                    if($result->num_rows > 0){
                        while (($u = $result->fetch_assoc())){
                            echo "<div class='divs'><a href='juego.php?codigo=".$u['jue_codigo']."'><img width='25%' src='../images/games/".$u['jue_imagen']."'></a><h3 style='color: white'>".$u['jue_nota']."</h3></div>";
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