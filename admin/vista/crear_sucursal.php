<?php 
    session_start();
    if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
       header("Location: /PracticaExamen/public/vista/login.html");
    }
    if(!isset($_SESSION['rol'])|| $_SESSION['rol'] == 2){
        header("Location: /PracticaExamen/public/vista/login.html");
    }
?>
<?php 
	include_once('../controladores/google.php');
	$google = new Google;
?>
<!DOCTYPE html>
<html>

<head>
    <title>MadGames</title>
    <meta charset=UTF-8″ />
    <link rel="shortcut icon" href="/PracticaExamen/public/images/icono.png">
    <link rel="stylesheet" href="/PracticaExamen/public/estilos/style.css" type="text/css">
    <link rel="stylesheet" href="/PracticaExamen/public/estilos/juegos.css" type="text/css">
    <script type="text/javascript" src="/PracticaExamen/public/javascript/javascript.js"></script>
    <script type="text/javascript" src="/PracticaExamen/public/javascript/juego.js"></script>
    <script type="text/javascript" src="/PracticaExamen/admin/controladores/functions.js"></script>
    <link rel="stylesheet" type="text/css" href="/PracticaExamen/admin/estilos/style.css">
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA9PzcEI7CfqittLmMseZcvwpgeawwdbxE&sensor=false&language=es"></script>
	<script type="text/javascript" src="/PracticaExamen/admin/controladores/jquery.js"></script>
</head>

<body>
    <header class="cabecera">
        <a href="/PracticaExamen/public/pages/index.php">
            <div class="logo">
                <img src="/PracticaExamen/public/images/logo.PNG">
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
        if(!isset($_SESSION['isLogged']) === TRUE){
            echo "<button class='boton'><a style='color: white' href=/PracticaExamen/public/vista/login.html>Login</a>";
        }else {
            echo "<button class='boton'><a style='color: white' href=/PracticaExamen/admin/vista/index.php>Cuenta</a>";
        }		
    ?>
    </div>
</header>
  <section class="dos">
    <div>
      <form method="POST" action="/PracticaExamen/admin/controladores/crear_sucursal.php" enctype="multipart/form-data">
		<table>
			<tr>
				<td class="p"><label for="nombre">Nombre de la Sucursal</label></td>
				<td><input type="text" name="nombre"></td>
			</tr>
			<tr>
				<td class="p"><label for="latitud">Latitud</label></td>
				<td><input type="text" placeholder="Latitud" name="latitud" id="my_lat" class="txt"></td>
			</tr>
			<tr>
				<td class="p"><label for="longitud">Longitud</label></td>
				<td><input type="text" placeholder="Longitud" name="longitud" id="my_lng" class="txt"></td>
            </tr>	
            <tr>
                <td class=""><input type="button" value="Obtener mi ubicacion - A" onclick="get_my_location();"></td>
                <td><input type="submit"  name="crear" value="Aceptar"></td>
            </tr>		
            
        </table>
        <br><br>
        <center><div class="map" style="width:50%" id="map"></div><center>
        <script type="text/javascript">
		    start_map();
	    </script>
	  </form>
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