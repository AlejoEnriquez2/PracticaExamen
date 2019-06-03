<?php
session_start();
$usuario = $_SESSION["codigo"];
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../public/vista/login.html");
    }
include '../../config/conexionBD.php';
?>
<!DOCTYPE html>
<html>

<head>
    <title>Factura</title>
    <meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
    <link rel="shortcut icon" href="/PracticaExamen/public/images/icono.png">
    <link rel="stylesheet" href="/PracticaExamen/public/estilos/style.css" type="text/css">
    <link rel="stylesheet" href="/PracticaExamen/public/estilos/juegos.css" type="text/css">
    <script type="text/javascript" src="/PracticaExamen/public/javascript/javascript.js"></script>
    <script type="text/javascript" src="/PracticaExamen/public/javascript/juego.js"></script>
    <script src="validacionesU.js"></script>

</head>

<body style="color:white">
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
    </header><center>
    <?php
        $sql = "SELECT *
                FROM usuarios
                where usu_codigo = $usuario";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
        $facid=$_GET['facid'];
        $dinero2=0;
        $dinero=0;
    ?>
    <?php
    echo "<h3 style='clear:both'>DETALLE FACTURAS #".$facid."</h3>";
    ?>
    <div id="datEmpr">
        <p>Nombre: MadGames </p>
        <p>Direccion Empresa(Simon Bolivar - Borreo)</p>
        <p>Telefono: 0985229478</p>
        <p>email:tienda@hotmail.cpmo</p>
        <p>Surcursal:Centro B</p>
    </div>
    <?php
    echo "<h3>DETALLE USUARIO</h3>";
    ?>
    <div id="detalles">
        <table>
            <div id="cabecera">
                <thead>
                    <tr>
                        <?php
                        echo "<th>Nombre: ".$row['usu_nombres']."</th>";
                        echo "<th>CI/Ruc: ".$row['usu_cedula']."</th>";
                        ?>
                    </tr>

                    <tr>
                        <?php
                        echo "<th>Correo: ".$row['usu_correo']."</th>";
                        echo "<th>Metodo de pago: Efectivo</th>";
                        ?>
                    </tr>
                </thead>
            </div>

        </table>
        <h3> Productos </h3>
        <table id="estilo">
                <thead>
                    <tr>
                        <th>Nombre del producto</th>
                        <th>Cantidad</th>
                        <th>Sub. total producto</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $codigo = $_SESSION['codigo'];
                        $sql ="SELECT *
                        FROM facturas   
                        where fac_usu_codigo = $codigo and fac_codigo=$facid
                        ORDER BY fac_fecha";
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){
                             echo "<tr>";
                                $sqlr = "SELECT *
                                FROM juegos,
                                     facturas,
                                     facturas_detalle
                                WHERE jue_codigo = fd_jue_codigo AND fac_codigo = ".$row['fac_codigo']." AND
                                        fd_fac_codigo = fac_codigo";
                                $resultr = $conn->query($sqlr);
                                if($resultr->num_rows > 0){
                                    while($rowr = $resultr->fetch_assoc()){
                                        //$dinerin = $dinerin + ($rowr['fd_jue_cantidad'] * $rowr['jue_precio']);
                                      echo "<td>".$rowr['jue_nombre']."</td>";
                                      echo "<td>".$rowr['fd_jue_cantidad']."</td>";
                                      $dinerin = $rowr['fd_jue_cantidad'] * $rowr['jue_precio'];
                                      echo " <td>" . $dinerin . " $</td>";
                                      $dinero = $dinero + ($rowr['fd_jue_cantidad'] * $rowr['jue_precio']);
                                      echo "</tr>";
                                    }
                                }
                                $dinero2 = $dinero2 + $dinero;
                         }  
                }else{
                    echo "<tr>";
                        echo "<td colspan='4'>No tiene ninguna compra realizada</td>";
                    echo "</tr>";
                }
            ?>
                </tbody>
            </table>
            <?php
            $dinero4= $dinero2 * 0.12;
            $dinero5 = $dinero2 - $dinero4;
            echo "<h3 style='clear:both'>Sub total: ".$dinero5."</h3>";
            echo "<h3 style='clear:both'>IVA: ".$dinero4."</h3>";
            echo "<h3 style='clear:both'>Total: ".$dinero2."</h3>";
            ?>
    </div>
    
    <footer class="pie">
        <h2>Universidad Politécnica Salesiana</h2>
        <h4>Desarrollado por: <em> &#8226; David Cornejo &#8226; Alejandro Enríquez &#8226; Paulo Gonzalez &#8226; Angel
                Ruiz &#8226; Evelyn Pintado</em></h4>
        <h6> <sub>&#169;</sub> <em> Todos los derechos reservados</em></h6>
    </footer>
</body></center>

</html>