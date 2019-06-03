<?php 
    session_start();
    /*if(!isset($_SESSION['isLogged'])|| $_SESSION['isLogged'] === FALSE){
       header("Location: /PracticaExamen/public/vista/login.html");
    }
    if(!isset($_SESSION['rol'])|| $_SESSION['rol'] == 2){
        header("Location: /PracticaExamen/public/vista/login.html");
    }*/
?>
<!DOCTYPE html>
<html>

<head>
  <title>MadGames</title>
  <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
  <link rel="shortcut icon" href="/PracticaExamen/public/images/icono.png">
  <link rel="stylesheet" href="/PracticaExamen/public/estilos/style.css" type="text/css">
  <link rel="stylesheet" href="/PracticaExamen/public/estilos/juegos.css" type="text/css">
  <script type="text/javascript" src="/PracticaExamen/public/javascript/javascript.js"></script>
  <script type="text/javascript" src="/PracticaExamen/public/javascript/juego.js"></script>
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
                  <li><a href="/PracticaExamen/public/pages/about.html">Quienes&nbsp;Somos</a></li>
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
      <div>
        <?php
          if(!isset($_SESSION['isLogged']) === FALSE){
            if($_SESSION['rol'] == 2){
              echo '<div class="like"><a href="/PracticaExamen/user/controladores/carrito.php?codigo=<?php echo "$codigo" ?>🛒</a></div>';
            }
            if($_SESSION['rol'] == 1){
              echo "<a style='color: white' href='/PracticaExamen/public/pages/editar_juego.php?codigo=$codigo'>Editar</a>";
              echo "<br><a style='color: white' href='../controladores/eliminar.php?codigo=<?php echo $codigo?>'>Eliminar</a>";
            }
          }
        ?>
      </div>
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