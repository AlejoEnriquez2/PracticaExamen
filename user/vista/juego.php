<!DOCTYPE html>
<html lang="en">

<head>
    <script type="text/javascript" src="comprar.js"> </script>
</head>

<body>
    <?php
        include '../../../config/conexionBD.php';
        
         $codigo = $_GET['id'];
    
         $sql ="SELECT *
                FROM usuarios
                WHERE usu_codigo =$codigo";
        $result = $conn->query($sql);
        $row = $result->fetch_assoc();
    
    ?>
    <h1>Prueba compra de juego</h1>
    <?php
                echo "<a codigo=link href=perfil.php?codigo=".$codigo.">Volver</a>";
            ?>


    <table id="estilo">
        <thead>
            <tr>
                <th>Codigo</th>
                <th>Nombre</th>
                <th>Precio</th>
                <th>Opcion</th>
            </tr>
        </thead>
        <?php

                $sql ="SELECT *
                FROM juegos
                ORDER BY jue_precio";


                $result = $conn->query($sql);
                if($result->num_rows > 0){
                         while($row = $result->fetch_assoc()){
                             echo "<tr>";
                                echo " <td>" . $row['jue_codigo'] . "</td>";
                                echo " <td>" . $row['jue_nombre'] ."</td>";
                                echo " <td>" . $row['jue_precio'] . "</td>";
                                echo " <td>" . "<a href=../controladores/carrito.php?id=".$codigo."&id_juego=".$row["jue_codigo"].">Añadir carrito"."</a>". "</td>";
                             echo "</tr>";
                         }  
                }else{
                    echo "<tr>";
                        echo "<td colspan='4'>No hay ningun juego</td>";
                    echo "</tr>";
                }
            ?>
    </table>


</body>

</html>