<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../public/vista/login.html");
    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Perfil</title>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/stylesGeneral.css">
    <link rel="stylesheet" href="css/stylesLogin.css">
    <link rel="stylesheet" href="/PracticaExamen/public/estilos/style.css" type="text/css">

    <script type="text/javascript" src="../controladores/ajax.js"></script>
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
                        <li><a href="about.html">Quienes&nbsp;Somos</a></li>
                        <li><a href="contacto.php?codigo=<?php echo $codigo ?>">Contacto</a></li>
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
			if(isset($_SESSION['isLogged']) === FALSE){
                echo "<button class='boton'><a style='color: white' href=/PracticaExamen/public/vista/login.html>Login</a>";
            }else {
                if(!isset($_SESSION['rol'])|| $_SESSION['rol'] == 2){
                    echo "<button class='boton'><a style='color: white' href=/PracticaExamen/user/vista/perfil.php>Cuenta</a>";
                }else{
                    echo "<button class='boton'><a style='color: white' href=/PracticaExamen/admin/vista/index.php>Cuenta</a>";
                }
                
            }		
		?>
        </div>
    </header>
    <?php
        include '../../config/conexionBD.php';
    
        $codigoc = $_SESSION['codigo'];
        $sqlc = "SELECT * 
                FROM usuarios
                where usu_codigo = $codigoc";
        $resultc = $conn->query($sqlc);
        $rowc = $resultc->fetch_assoc();
        if($rowc["usu_rol_id"] == 1){
           header("Location: ../../../public/vista/blanco.html"); 
        }
  ?>
    <?php
    $codigoU = $_SESSION['codigo'];
    $dinerin = 0;
    $dinero = 0;
   ?>
    <?php
        include '../../config/conexionBD.php';
    
         $sql ="SELECT *
                FROM usuarios
                WHERE usu_codigo =$codigoU";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
    ?>



    <main>
        <section>

        </section>
        <div id="izquierda">
            <form action="../controladores/update_perfil.php" method="post" class="form login"
                enctype="multipart/form-data">
                <header class="login_cabezera">
                    <h3 class="login_titulo">Mi Cuenta</h3>
                </header>
                <div class="login_centro">
                    <input type="text" name="codigo" value="<?php echo $codigoU?>" hidden="hidden">
                    <div class="form__field">
                        <?php
                echo "<img class='foto' id='foto' src='data:".$row['usu_img_extencion']."; base64,".base64_encode($row['usu_imagen'])."'>";
            ?>

                        <input type='file' name='imagenUpdate' id='imagen' size='20'>
                    </div>

                    <div class="form__field">
                        <label for="nombres">Nombres</label>
                        <input type="text" name="nombres" value="<?php echo $row['usu_nombres']?>">
                    </div>
                    <div class="form__field">
                        <label for="apellido">Apellidos</label>
                        <input type="text" name="apellidos" value="<?php echo $row['usu_apellidos']?>">
                    </div>
                    <div class="form__field">
                        <label for="cedula">Cedula</label>
                        <input type="text" name="cedula" value="<?php echo $row['usu_cedula']?>">
                    </div>
                    <div class="form__field">
                        <label for="fechaNacimiento">Nacimiento</label>
                        <input type="text" name="fechaNacimiento" value="<?php echo $row['usu_fecha_nac']?>">
                    </div>
                    <div class="form__field">
                        <label for="correo">Correo</label>
                        <input type="text" name="correo" value="<?php echo $row['usu_correo']?>">
                    </div>
                </div>
                <footer class="login_ingresar">
                    <?php
                //echo "<a id=link href=contrasena.php?id=".$codigo.">Cambiar Contraseña</a>";
            ?>
                    <?php
                //echo "<a id=link href=eliminar.php?id=".$codigo.">Eliminar Usuario</a>";
            ?>
                    <?php
                echo "<a id=link href=../controladores/cerrar_sesion.php>Cerrar Sesion</a>";
            ?>
                    <?php
                echo "<a id=link href=carro_compras.php?>Carrito Compras</a>";
                    ?>
                    <input class="btn" type="submit" name="Login" value="GUARDAR">
                </footer>
        </div>
        </form>
        <div id="derecha">
            <form action="../controladores/update_perfil.php" method="post" class="form login"
                enctype="multipart/form-data">
                <header class="login_cabezera">
                    <div class='aumento'>
                        <img id="fotito" src="../vista/images/icono.png" alias="Bolsa dinero">
                        <label class="login_titulo">Dinero disponible: </label>
                        <label><?php echo $row['usu_dinero']?> $</label>
                    </div>
                </header>
            </form>
        </div>
        <div id="derecha">
            <header class="login_cabezera">
                <h3 class="login_titulo">Compras Realizadas</h3>
            </header>
            <table id="estilo">
                <thead>
                    <tr>
                        <th>Fecha de Compra </th>
                        <th>Num Factura</th>
                        <th>Total Gastado</th>
                        <th>Opcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                        $codigo = $_SESSION['codigo'];

                $sql ="SELECT *
                FROM facturas
                   
                where fac_usu_codigo = $codigo 
                ORDER BY fac_fecha";


                
                $result = $conn->query($sql);
                if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){
                             echo "<tr>";
                                echo " <td>" . $row['fac_fecha'] . "</td>";
                                echo " <td>" . $row['fac_codigo'] ."</td>";
                                $sqlr = "SELECT *
                                FROM juegos,
                                     facturas,
                                     facturas_detalle
                                WHERE jue_codigo = fd_jue_codigo AND fac_codigo = ".$row['fac_codigo']." AND
                                        fd_fac_codigo = fac_codigo";
                                $resultr = $conn->query($sqlr);
                                if($resultr->num_rows > 0){
                                    while($rowr = $resultr->fetch_assoc()){
                                        $dinerin = $dinerin + ($rowr['fd_jue_cantidad'] * $rowr['jue_precio']);
                                      
                                    }
                                }
                                $dinero = $dinero + $dinerin;
                                echo " <td>" . $dinerin . " $</td>";
                                $dinerin =0;
 
                               echo " <td> <a href=''>Ver Factura(Proximamente)</a> </td>";
                             echo "</tr>";
                         }  
                }else{
                    echo "<tr>";
                        echo "<td colspan='4'>No tiene ninguna compra realizada</td>";
                    echo "</tr>";
                }
            ?>
                </tbody>
            </table>
            <header class="login_cabezera">
                <?php
                    echo "<h3 class='login_titulo'>Total Gastado: ".$dinero." $</h3>";
                ?>
            </header>
        </div>
    </main>
</body>

</html>