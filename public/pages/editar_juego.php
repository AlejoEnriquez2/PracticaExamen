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
  <title>Editar Juego</title>
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
  <link rel="shortcut icon" href="../images/icono.png">
  <link rel="stylesheet" href="../estilos/style.css" type="text/css">
  <link rel="stylesheet" href="../estilos/juegos.css" type="text/css">
  <?php
			include '../../config/conexionBD.php';
					$codigo = $_GET['codigo'];
					$sql = "SELECT * FROM juegos WHERE jue_codigo= '$codigo'";
					$result = $conn->query($sql);
                    $u = $result->fetch_assoc();
					$nombre = $u['jue_nombre'];
					$descripcion =$u['jue_descripcion'];
					$sisOperativo = $u['jue_sistema_operativo'];
					$procesador = $u['jue_procesador'];
					$ram = $u['jue_ram'];
					$almacenamiento = $u['jue_memoria'];
					$precio = $u['jue_precio'];
					$categoria = $u['jue_categoria'];
					$descuento = $u['jue_descuento'];			
		?>
 
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
                    
                    <li><a href="carrito.html">Carrito</a></li>
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
      <form method="POST" action="../controladores/editar_juego.php?codigo=<?php echo $codigo?>" enctype="multipart/form-data">
		<table>
		
			<tr>
				<td class="p"><label for="nombre">Nombre del Juego</label></td>
				<td><input type="text" name="nombre" value="<?php echo $nombre?>"></input></td>
			</tr>
			<tr>
				<td class="p"><label for="descripcion">Descripcion</label></td>
				<td><textarea type="text" name="descripcion"><?php echo $descripcion?></textarea></td>
			</tr>
			<tr>
				<td class="p"><label for="sisOperativo">Sistema Operativo</label></td>
				<td><input type="text" name="sisOperativo" value="<?php echo $sisOperativo?>"></input></td>
			</tr>
			<tr>
				<td class="p"><label for="procesador">Procesador</label></td>
				<td><input type="text" name="procesador" value="<?php echo $procesador?>"></input></td>
			</tr>
			<tr>
				<td class="p"><label for="ram">Memoria Ram</label></td>
				<td><input type="text" name="ram" value="<?php echo $ram?>"></input></td>
			</tr>
			<tr>
				<td class="p"><label for="almacenamiento">Almacenamiento</label></td>
				<td><input type="text" name="almacenamiento" value="<?php echo $almacenamiento?>"></input></td>
			</tr>
			<tr>
				<td class="p"><label for="precio">Precio</label></td>
				<td><input type="text" name="precio" value="<?php echo $precio?>"></input></td>
			</tr>
			<tr>
				<td class="p"><label for="categoria">Categoria</label></td>
				<td>
					<select name="categoria">
						<option value="1">Accion</option>
						<option value="2">Terror</option>
						<option value="3">Deporte</option>
						<option value="4">Rol</option>
					</select>
				</td>
			</tr>
			<tr>
				<td class="p"><label for="descuento">Descuento</label></td>
				<td><input type="text" name="descuento"  value="<?php echo $descuento?>"></input></td>
			</tr>
			<tr>
				<td><label class="p" for="imagen">Agregar Imagen</label></td>
				<td><input type="file" name="imagen" multiple></td>
			</tr>
			<tr>
				<td></td>
				<td><input type="submit"  name="crear" value="Aceptar"></td>
			</tr>
		</table>
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