<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <link rel="stylesheet" href="css/stylesGeneral.css">
    <link rel="stylesheet" href="css/stylesLogin.css">
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

    <?php
        include '../../../config/conexionBD.php';
        $codigo=$_GET["id"];
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

    <main class="align">
        <div>
            <header class="login_cabezera">
                <h3 class="login_titulo">Carrito de compras</h3>
            </header>
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
                
                    echo "<a class='boton_personalizado' href=../controladores/comprar.php?id=".$codigo."&total=".$total2."> Comprar"."</a><a class='boton_personalizado3' codigo=link href=perfil.php?codigo=".$codigo.">Volver</a>";
                    ?>
                    </div>
                </div>
            </header>
        </div>
    </main>
</body>

</html>