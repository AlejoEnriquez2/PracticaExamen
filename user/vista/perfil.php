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

    <script type="text/javascript" src="../controladores/ajax.js"></script>
</head>

<body>
    <?php
        include '../../config/conexionBD.php';
    
        $codigoc = $_GET['codigo'];
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
    $codigo = $_GET['codigo'];
    $dinerin = 0;
   ?>
    <?php
        include '../../config/conexionBD.php';
    
         $sql ="SELECT *
                FROM usuarios
                WHERE usu_codigo =$codigo";
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
                    <input type="text" name="codigo" value="<?php echo $codigo?>" hidden="hidden">
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
                echo "<a id=link href=../controladores/cerrar_sesion.php?id=".$codigo.">Cerrar Sesion</a>";
            ?>

                    <?php
                echo "<a id=link href=juego.php?id=".$codigo.">Comprar juego</a>";
            ?>
                    <?php
                echo "<a id=link href=carro_compras.php?id=".$codigo.">Carrito Compras</a>";
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
                        <th>Juego</th>
                        <th>Precio</th>
                        <th>Opcion</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                $codigo = $_GET['codigo'];

                $sql ="SELECT *
                FROM compras,
                     usuarios,
                     juegos
                where com_usu_codigo = usu_codigo AND
                com_jue_codigo = jue_codigo
                ORDER BY com_fecha";


                $result = $conn->query($sql);
                if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){
                             echo "<tr>";
                                echo " <td>" . $row['com_fecha'] . "</td>";
                                echo " <td>" . $row['jue_nombre'] ."</td>";
                                echo " <td>" . $row['jue_precio'] . " $</td>";
                                $dinerin = $dinerin + $row['jue_precio'];
                             //   echo " <td>" . "<a href=../controladores/leer_mensaje.php?id=".$row["cor_codigo"]."&id_usu=".$row["cor_id_usu_remitente"]."&id_des=".$codigo.">Ver Factura"."</a>". "</td>";
                             echo "</tr>";
                         }  
                }else{
                    echo "<tr>";
                        echo "<td colspan='4'>No tiene ningun mensaje en su bandeja de entrada</td>";
                    echo "</tr>";
                }
            ?>
                </tbody>
            </table>
            <header class="login_cabezera">
                <?php
                    echo "<h3 class='login_titulo'>Total Gastado: ".$dinerin." $</h3>";
                ?>
            </header>
        </div>
    </main>
</body>

</html>