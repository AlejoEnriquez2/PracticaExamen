<!DOCTYPE html>
<html>

<head>
    <title>Sistema de Gestión de Personas</title>
    <meta charset="utf-8">
    <link rel="shortcut icon" href="../images/icono.png">
    <link rel="stylesheet" href="../estilos/style.css" type="text/css">
    <script type="text/javascript" src="../javascript/javascript.js"></script>

</head>

<body>

    <?php
    include '../../config/conexionBD.php';
    session_start();
    $codigo = $_GET['codigo'];
   ?>
    <header class="cabecera">
        <a href="index.p">
            <div class="logo">
                <img src="../images/logo.PNG">
                <h2>MadGames</h2>hp
            </div>
        </a>
        <div class="menu">
            <ul class="navegacion">

                <li>
                    <a href="index.php">Juegos</a>
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
						<?php
                		if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === TRUE){
							echo "<li><a href=contacto.php?codigo=".$codigo.">Contacto</a></li>";
                		}else{
                    		echo "<li><a href=../vista/login.html>Contacto</a></li>";
                		}
                		?>
						
                        
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
                    <input class="boton" type="button" id="buscar" name="buscar" value="Buscar" onclick="">
                    <!--<img class="iB" src="../images/search.png">-->
                </li>
            </ul>
        </div>
        <div class="cuenta">
            <?php
                if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === TRUE){
                    echo "<button class='boton'><a href=../../user/vista/perfil.php?codigo=".$codigo.">Cuenta</a></button>";
                }else{
                    echo "<button class='boton'><a href=../vista/login.html>Cuenta</a></button>";
                }
                //<button class="boton">Salir</button>
                ?>
        </div>
    </header>
    <section class="dos">
        <center>
            <div id="informacion">
                <a href="index.html"><img width="25%" class="mySlides" src="../images/icono.png"></a>
                <a href="index.html"><img width="50%" id="0" class="mySlides" src=""></a>
                <a href="index.html"><img width="50%" id="1" class="mySlides" src=""></a>
                <a href="index.html"><img width="50%" id="2" class="mySlides" src=""></a>
                <a href="index.html"><img width="50%" id="3" class="mySlides" src=""></a>
                <a href="index.html"><img width="50%" id="4" class="mySlides" src=""></a>
                <button id="izq" onclick="plusDivs(-1)">Anterior</button>
                <button id="center" onclick="reiniciar()">Reiniciar</button>
                <button id="der" onclick="plusDivs(+1)">Siguiente</button>
            </div>
        </center>
        <div class="col2">
            <h1>JUEGOS</h1>
            <div id="div1" class="divs"><a href="juego.php?codigo=1"><img src="../images/games/1.jpg"></a></div>
            <div id="div2" class="divs"><a href="juego.php?codigo=2"><img src="../images/games/2.jpg"></a></div>
            <div id="div3" class="divs"><a href="juego.php?codigo=3"><img src="../images/games/3.jpg"></a></div>
            <div id="div4" class="divs"><a href="juego.php?codigo=4"><img src="../images/games/4.jpg"></a></div>
            <div id="div5" class="divs"><a href="juego.php?codigo=5"><img src="../images/games/5.jpg"></a></div>
            <div id="div6" class="divs"><a href="juego.php?codigo=6"><img src="../images/games/6.jpg"></a></div>
            <div id="div7" class="divs"><a href="juego.php?codigo=7"><img src="../images/games/7.jpg"></a></div>
            <div id="div8" class="divs"><a href="juego.php?codigo=8"><img src="../images/games/8.jpg"></a></div>
        </div>

    </section>
    <footer class="pie">
        <h2>Universidad Politécnica Salesiana</h2>
        <h4>Desarrollado por: <em> &#8226; David Cornejo &#8226; Alejandro Enríquez &#8226; Paulo Gonzalez &#8226; Angel
                Ruiz &#8226; Evelyn Pintado</em></h4>
        <h6> <sub>&#169;</sub> <em> Todos los derechos reservados</em></h6>
    </footer>
</body>

</html>