<!DOCTYPE html>
<html>
    <head>
		<title>Sistema de Gestión de Personas</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="../images/icono.png">
        <link rel="stylesheet" href="../estilos/style.css" type="text/css">
        <script type="text/javascript" src="../javascript/javascript.js"></script>
        <?php
            include '../../config/conexionBD.php';
            $cat = $_GET['cat'];
            $datos = "SELECT * FROM juegos WHERE jue_categoria = '$cat'";
            if ($cat == 1){
                $categoria = 'Accion';
            }else if ($cat == 2){
                $categoria = 'Terror';
            }else if ($cat == 3){
                $categoria = 'Deporte';
            }else if ($cat == 4){
                $categoria = 'Rol';
            }
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
                            <li><a href="#">Mejores</a></li>
                            <li><a href="#">Novedades</a></li>
                            <li><a href="categorias.html">Categorías</a>
                                <ul style="top: 113px">
                                    <li><a href="categoria.php?codigo=1">Accion</a></li>
                                    <li><a href="categoria.php?codigo=2">Terror</a></li>
                                    <li><a href="categoria.php?codigo=3">Deporte</a></li>
                                    <li><a href="categoria.php?codigo=4">Rol</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="biblioteca.html">Ofertas</a>
                        <ul>
                            <li><a href="#">Mejores</a></li>
                            <li><a href="#">Mejor&nbsp;Puntuados</a></li>
                            <li><a href="#">Free2Play</a></li>
                        </ul>
                    </li>
                    <li>
                        <a href="comunidad.html">About</a>
                        <ul>
                            <li><a href="#">Quienes&nbsp;Somos</a></li>
                            <li><a href="#">Contacto</a></li>
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
                <button class="boton"><a href="cuenta.html">Cuenta</a></button>
                <button class="boton">Salir</button>
            </div>
        </header>
        <section class="dos">
            <center><div>
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
                <h1><?php echo "$categoria"?></h1>


                <?php
                    $result = $conn->query($datos);
                    if($result->num_rows > 0){
                        while ($u = $result->fetch_assoc()){
                            echo "<div class='divs'><a href='juego.php?codigo=".$u['jue_codigo']."'><img width='25%' src='../images/games/".$u['jue_imagen']."'></a></div>";
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