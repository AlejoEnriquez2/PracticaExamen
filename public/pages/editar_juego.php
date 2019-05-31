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
            <li><a href="gratis.php">Free2Play</a></li>
          </ul>
        </li>
        <li>
          <a href="about.html">About</a>
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
      <button class="boton"><a href="../vista/login.html">Cuenta</a></button>
      <button class="boton">Salir</button>
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