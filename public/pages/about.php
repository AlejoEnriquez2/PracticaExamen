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
	
	<head>
		<meta charset="utf8_general_ci">
		<title>Acerca de nosotros</title>
		<!-- ESTILOS -->
		
		<link rel="shortcut icon" href="/PracticaExamen/public/images/icono.png">
        <meta charset="utf-8">
        <link rel="stylesheet" href="/PracticaExamen/public/estilos/style.css" type="text/css">
        <script type="text/javascript" src="/PracticaExamen/public/javascript/javascript.js"></script>
	</head>
	
	<body>

		<header>
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
		<section class="t1">

		
		<table>
			<tr>
				<td>
					<caption><a href="/PracticaExamen/public/pages/index.php"><img width="6%" style="float:left" src="../images/back.png"></a><h1 align="left">QUIENES SOMOS?</h1></caption>
				</td>
			</tr>
			
			<tr>
				<td>
				
					<caption><img id="ima" src="images/videojuegos.png" alt="imagen1" align="left"/><article class="a"><p><strong>MADGAMES</strong> es la mejor página de venta y distribución de videojuegos. Contamos con un gran catalogo de titulos de todo tipo de genero y 
					para cualquier tipo de plataforma, con una cantidad de casi 30000 juegos publicados; desde grandes compañias hasta estudios independientes,
					además de traer siempre a nuestros miembros los ultimos titulos del mercado. Nos caracterizamos por nuestros bajos precios que estan siempre
					al alcance de cualquier bolsillo, sin mencionar nuestras numerosas promociones y descuentos.</p></article>
					</caption>
					
				</td>
			</tr>
			
			<tr>
				<td>
					<article class="a">
					<h1>MISION</h1>
					<p>Satisfacer las necesidades de las personas interesadas en los videojuegos y articulos de novedad, prestandoles el mejor servicio por parte de todo el personal de la empresa, y manteniendo siempre actualizado nuestro catálogo de juegos y articulos para las diferentes plataformas, haciendo que seamos la principal eleccion cuando de comprar videojuegos se trata.</p>
					</article>
				</td>
				
				<td>
					<article class="a">
					<h1>VISION</h1>
					<p>Llegar a más lugares del Ecuador e incluso a diferentes partes del mundo, destacandonos por ofrecer el mejor servicio al cliente, con los juegos y artículos más nuevos y actualizados y principalmente con la mejor comodidad y seguridad del mundo.</p>
					</article>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<h1>Google Maps - Ubicaciones</h1>
					<iframe src="/PracticaExamen/map_rutas/"  
						marginwidth="0" marginheight="0" name="ventana_iframe" scrolling="no" border="0"  
						frameborder="0" width="1000" height="600"> 
					</iframe> 
				</td>
			</tr>
		
		</table>
	</body>
	</section>
	<footer class="pie">
            <h2>Universidad Politécnica Salesiana</h2>
            <h4>Desarrollado por: <em> &#8226; David Cornejo &#8226; Alejandro Enríquez &#8226; Paulo Gonzalez &#8226; Angel Ruiz &#8226; Evelyn Pintado</em></h4>
            <h6> <sub>&#169;</sub> <em> Todos los derechos reservados</em></h6>
       </footer>
</html>