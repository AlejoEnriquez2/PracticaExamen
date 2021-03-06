<?php 
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
	
	<?php
		include '../../config/conexionBD.php';
        
    ?>
	
    <head>
		<title>MadGames</title>
        <meta charset="utf-8">
        <link rel="shortcut icon" href="/PracticaExamen/public/images/icono.png">
        <link rel="stylesheet" href="/PracticaExamen/public/estilos/style.css" type="text/css">
        <script type="text/javascript" src="/PracticaExamen/public/javascript/javascript.js"></script>
		<?php
			include '../../config/conexionBD.php';
			$sql= "SELECT * FROM juegos WHERE jue_eliminado = '0'";
			$result = $conn->query($sql);
			
		?>
    </head>
    <body>	
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
                            <li><a href="/PracticaExamen/public/pages/about.php">Quienes&nbsp;Somos</a></li>
                            <li><a href="/PracticaExamen/public/pages/contacto.php">Contacto</a></li>
                        </ul>
                    </li>
                    <?php
                        if(isset($_SESSION['isLogged']) === TRUE){
                            if($_SESSION['rol'] == 2){
                                echo '<li><a href="/PracticaExamen/user/vista/carro_compras.php">Carrito</a></li>';
                            }
                            if($_SESSION['rol'] == 1){
                                echo '<li><a href="/PracticaExamen/public/pages/index.php">Carrito</a></li>';
                            }
                        }else{
                            echo '<li><a href="/PracticaExamen/public/vista/login.html">Carrito</a></li>';
                        }
                            
                    ?>
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
                $codigo = $_SESSION['codigo'];
                if(!isset($_SESSION['rol'])|| $_SESSION['rol'] == 2){
                    echo "<button class='boton'><a style='color: white' href=/PracticaExamen/user/vista/perfil.php>Cuenta</a>";
                }else{
                    echo "<button class='boton'><a style='color: white' href=/PracticaExamen/admin/vista/index.php>Cuenta</a>";
                }
                
            }		
		?>
        </div>
    </header>
    <section class="dos">
        <center>
            <div id="informacion">
                <a href="/PracticaExamen/public/pages/index.php"><img width="25%" class="mySlides" src="/PracticaExamen/public/images/icono.png"></a>
                <a href="/PracticaExamen/public/pages/index.php"><img width="50%" id="0" class="mySlides" src=""></a>
                <a href="/PracticaExamen/public/pages/index.php"><img width="50%" id="1" class="mySlides" src=""></a>
                <a href="/PracticaExamen/public/pages/index.php"><img width="50%" id="2" class="mySlides" src=""></a>
                <a href="/PracticaExamen/public/pages/index.php"><img width="50%" id="3" class="mySlides" src=""></a>
                <a href="/PracticaExamen/public/pages/index.php"><img width="50%" id="4" class="mySlides" src=""></a>
                <button id="izq" onclick="plusDivs(-1)">Anterior</button>
                <button id="center" onclick="reiniciar()">Reiniciar</button>
                <button id="der" onclick="plusDivs(+1)">Siguiente</button>
            </div>
        </center>
        <div class="col2">
            <h1 stlye="color:white">JUEGOS</h1>
			<?php
				if($result->num_rows > 0){
					while (($u = $result->fetch_assoc())){
					echo "<div class='divs'><a href='/PracticaExamen/public/pages/juego.php?codigo=".$u['jue_codigo']."'><img width='25%' src='/PracticaExamen/public/images/games/".$u['jue_imagen']."'></a><h3 style='color: white'></h3></div>";
					}
				}
			?>
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