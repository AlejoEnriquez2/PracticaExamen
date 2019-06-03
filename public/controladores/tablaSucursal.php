<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h3>Sucursales</h3>
               
        <table style="width:100%">
            <tr>
                <th>Nombre</th>
                <th>Latitud</th>
                <th>Longitud</th>
                <th>Fecha</th>
            </tr>
        
        
        <?php
        include '../../config/conexionBD.php';
        $sql = "SELECT * FROM tbl_tienda WHERE tienda_eliminado = 0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row["tienda_nombre"] . "</td>";
            echo " <td>" . $row['tienda_latitud'] . "</td>";
            echo " <td>" . $row['tienda_longitud'] . "</td>";
            echo " <td>" . $row['tienda_registro'] . "</td>";
            echo " <td> <a style='color:white' href='/PracticaExamen/public/controladores/eliminarSucursal.php?codigo=".$row['tienda_id']."'>Eliminar</a> </td>";
            echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen juegos registradas en el sistema </td>";
            echo "</tr>";
        }
        ?>
        <a class="boton" href="/PracticaExamen/admin/vista/crear_sucursal.php">Crear Sucursal</a>
	 </table>
    </body>
</html>
