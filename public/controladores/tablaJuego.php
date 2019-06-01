<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h3>Juegos Registrados</h3>
               
        <table style="width:100%">
            <tr>
                <th>Titulo</th>
                <th>Imagen</th>
                <th>Precio</th>
                <th>Fecha</th>
            </tr>
        
        
        <?php
        include '../../config/conexionBD.php';
        $sql = "SELECT * FROM juegos WHERE jue_eliminado = 0";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
            echo "<tr>";
            echo " <td>" . $row["jue_nombre"] . "</td>";
            echo " <td>" . $row['jue_imagen'] . "</td>";
            echo " <td>" . $row['jue_precio'] . "</td>";
            echo " <td>" . $row['jue_fecha'] . "</td>";
            echo " <td> <a style='color:white' href='/PracticaExamen/public/controladores/eliminar.php?codigo=" . $row['jue_codigo'] . "'>Eliminar</a> </td>";
            echo " <td> <a style='color:white' href='/PracticaExamen/public/pages/editar_juego.php?codigo=" . $row['jue_codigo'] . "'>Modificar</a> </td>";
            echo "</tr>";
            }
        } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen juegos registradas en el sistema </td>";
            echo "</tr>";
        }
        ?>
	 </table>
    </body>
</html>
