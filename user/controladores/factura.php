<?php
session_start();
$usuario = $_SESSION["codigo"];

include '../../config/conexionBD.php';
?>
<!DOCTYPE html>
<html>

<head>
    <meta charset="utf-8">
    <title>Compras</title>
    <link href="estilosEvelyn.css" rel="stylesheet" />
    <script src="validacionesU.js"></script>

</head>

<body>
    <?php
        $sql = "SELECT *
                FROM usuarios
                where usu_codigo = $usuario";
                $result = $conn->query($sql);
                $row = $result->fetch_assoc();
        $facid=$_GET['facid'];
    ?>
    <h3>DETALLE FACTURAS</h3>
    <div id="datEmpr">
        <p>Nombre: MadGames </p>
        <p>Direccion Empresa(Simon Bolivar - Borreo)</p>
        <p>Telefono: 0985229478</p>
        <p>email:tienda@hotmail.cpmo</p>
        <p>Surcursal:Centro B</p>
    </div>
    <h3>DETALLE USUARIO</h3>
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
                                      echo "</tr>";
                                    }
                                }
                               
                         }  
                }else{
                    echo "<tr>";
                        echo "<td colspan='4'>No tiene ninguna compra realizada</td>";
                    echo "</tr>";
                }
            ?>
                </tbody>
            </table>

    </div>
</body>

</html>