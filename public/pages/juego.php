<!DOCTYPE html>
<html>

<head>
  <title>Sistema de Gestión de Personas</title>
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
  <link rel="shortcut icon" href="../images/icono.png">
  <link rel="stylesheet" href="../estilos/style.css" type="text/css">
  <link rel="stylesheet" href="../estilos/juegos.css" type="text/css">
  <script type="text/javascript" src="../javascript/javascript.js"></script>
  <script type="text/javascript" src="../javascript/juego.js"></script>
  <?php
    include '../../config/conexionBD.php';
    $codigo = $_GET['codigo'];
    $datos = "SELECT * FROM juegos WHERE jue_codigo = '$codigo'";
    $result = $conn->query($datos);
    $u = $result->fetch_assoc();
    $nombre = $u['jue_nombre'];
    $descripcion = $u['jue_descripcion'];
    $sisOperativo = $u['jue_sistema_operativo'];
    $procesador = $u['jue_procesador'];
    $memoria = $u['jue_memoria'];
    $ram = $u['jue_ram'];
    $precio = $u['jue_precio'];
    $imagen = $u['jue_imagen'];
    $categoria = $u['jue_categoria'];
	$nota = $u['jue_nota'];
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
            <li><a href="about.html">Quienes&nbsp;Somos</a></li>
			<li><a href="contacto.php">Contacto</a></li>
          </ul>
        </li>

        <li><a href="carrito.html">Carrito</a></li>
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
  <center><div id="informacion"></div></center>
    <div class="img">
      <img width="25%" class="imagen" src='../images/games/<?php echo "$imagen"?>'>

    </div>
    <div class="info">
      <h1 class="p"><?php echo "$nombre" ?></h1>
      <p class="p"><?php echo "$descripcion" ?></p>
      <table>
        <tr>
          <th></th>
          <th class="p">Minimo</th>
        </tr>
        <tr>
          <td class="p">SO</td>
          <td class="c"><?php echo "$sisOperativo" ?></td>
        </tr>
        <tr>
          <td class="p">Procesador</td>
          <td class="c"><?php echo "$procesador" ?></td>
        </tr>
        <tr>
          <td class="p">Memoria</td>
          <td class="c"><?php echo "$ram" ?></td>
        </tr>
        <tr>
          <td class="p">Almacenamiento</td>
          <td class="c"><?php echo "$memoria" ?></td>
        </tr>
        <tr>
          <td class="c">$<?php echo "$precio" ?></td>
		  <td class="c"><?php echo "$descuento"?>%</td>
        </tr>
      </table>
      <div class="centrado">
	 
        <div class="like"><a href="../controladores/aumentar.php?codigo=<?php echo "$codigo" ?>">👍</a></div>
		<div class="like" id="nota"><?php echo "$nota" ?></div>
        <div class="like"><a href="#">🛒</a></div>
		<a href="editar_juego.php?codigo=<?php echo $codigo?>">Editar</a>
      </div>
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