<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /PracticaExamen/public/vista/login.html");
    }
    if($_SESSION['rol'] == 1){
        header("Location: /PracticaExamen/public/pages/index.php");
    }
    
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" href="/PracticaExamen/public/images/icono.png">
    <link rel="stylesheet" href="/PracticaExamen/user/vista/css/stylesGeneral.css">
    <link rel="stylesheet" href="/PracticaExamen/user/vista/css/stylesLogin.css">
    <link rel="stylesheet" href="/PracticaExamen/public/estilos/style.css" type="text/css">
    <script type="text/javascript" src="/PracticaExamen/admin/controladores/functions.js"></script>
    <script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA9PzcEI7CfqittLmMseZcvwpgeawwdbxE&sensor=false&language=es"></script>
	<script type="text/javascript" src="/PracticaExamen/admin/controladores/jquery.js"></script>
    <title>Carrito</title>
    <style type="text/css">
        .boton_personalizado {
            text-decoration: none;
            padding: 10px;
            font-weight: 600;
            font-size: 20px;
            color: #ffffff;
            background-color: #18ba18;
            border-radius: 6px;
            border: 2px solid #01571a;
        }

        .boton_personalizado:hover {
            color: #18ba25;
            background-color: #ffffff;
        }

        .boton_personalizado2 {
            text-decoration: none;
            padding: 10px;
            font-weight: 600;
            font-size: 20px;
            color: #ffffff;
            background-color: #c50b0b;
            border-radius: 6px;
            border: 2px solid #570101;
        }

        .boton_personalizado2:hover {
            color: #ba1818;
            background-color: #ffffff;
        }

        .boton_personalizado3 {
            text-decoration: none;
            padding: 10px;
            font-weight: 600;
            font-size: 20px;
            color: #ffffff;
            background-color: #1dabb8;
            border-radius: 6px;
            border: 2px solid #01571a;
        }

        .boton_personalizado3:hover {
            color: #1dabb8;
            background-color: #ffffff;
        }
    </style>
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
                    <li><a href="/PracticaExamen/public/pages/about.html">Quienes&nbsp;Somos</a></li>
                    <li><a href="/PracticaExamen/public/pages/contacto.php?codigo=<?php echo $codigo ?>">Contacto</a></li>
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
        $codigo=$_SESSION['codigo'];
        $total=0;
        $total2=0;
    ?>
    <?php
     $sql2="SELECT *
            FROM carritos
            WHERE car_usu_codigo=$codigo";
            $result=$conn->query($sql2);
            $row2 = $result->fetch_assoc();
            $codigoJ=$row2['car_jue_codigo'];

    ?>

    <main>
        <div>
            <table id="estilo">
                <thead>
                    <tr>
                        <th>Nombre</th>
                        <th>Precio Unit</th>
                        <th>Cantidad</th>
                        <th>Precio Total</th>
                        <th>Opciones</th>
                    </tr>
                </thead>
                <?php

                $sql ="SELECT *
                FROM carritos,
                    juegos
                where car_usu_codigo=$codigo and jue_codigo = car_jue_codigo";

                $result = $conn->query($sql);
                if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){
                             echo "<tr>";
                                echo " <td>" . $row['jue_nombre'] . "</td>";
                                echo " <td>" . $row['jue_precio'] ."$</td>";
                                echo " <td>" . $row['car_cantidad']. "</td>";
                                $total = $row['jue_precio'] * $row['car_cantidad'];
                                $total2 = $total2 + $total;
                                echo "<td>$total$</td>";
                                echo " <td><a class='boton_personalizado2' href=../controladores/eliminar_carro.php?id=".$codigo."&id_juego=".$row["jue_codigo"]."> Eliminar"."</a></td>";
                             echo "</tr>";
                         }  
                }else{
                    echo "<tr>";
                        echo "<td colspan='4'>No tienes ningun juego en su carritos de compra</td>";
                    echo "</tr>";
                }
            ?>
            </table>
            <header class="login_cabezera">
                <div>
                    <div>
                        <?php
                    echo "<h3 class='login_titulo'>Total a pagar: ".$total2."$   </h3><br>";
                    ?>
                    
                    <?php
                        echo "<a class='boton_personalizado' href=/PracticaExamen/user/vista/sucursal.php?id=".$codigo."&total=".$total2."> Comprar"."</a>";
                    //echo "<a class='boton_personalizado' href=/PracticaExame/user/controladores/comprar.php?id=".$codigo."&total=".$total2."> Comprar"."</a><a class='boton_personalizado3' codigo=link href=perfil.php>Volver</a>";
                    ?>
                    </div>
                </div>
            </header>
        </div>
        
    </main>
    <footer class="pie">
        <h2>Universidad Politécnica Salesiana</h2>
        <h4>Desarrollado por: <em> &#8226; David Cornejo &#8226; Alejandro Enríquez &#8226; Paulo Gonzalez &#8226; Angel
                Ruiz &#8226; Evelyn Pintado</em></h4>
        <h6> <sub>&#169;</sub> <em> Todos los derechos reservados</em></h6>
    </footer>
</body>
    

</html>