<!DOCTYPE html>
<html>
    <head></head>
    <body>
        <h3>Mensajes</h3>
        
        <table style="width:100%">
        <tr>
        <th>Fecha</th>
        <th>Remite</th>
        <th>Destinatario</th>
        <th>Asunto</th>
        <th>Mensaje</th>
        </tr>
        
        
        <?php
        include '../../config/conexionBD.php';
        $sql = "SELECT * FROM correo";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {

        while($row = $result->fetch_assoc()) {
        echo "<tr>";
        echo " <td>" . $row["cor_fecha_envio"] . "</td>";
        echo " <td>" . $row['cor_usu_remite'] ."</td>";
        echo " <td>" . $row['cor_usu_destino'] . "</td>";
        echo " <td>" . $row['cor_asunto'] . "</td>";
        echo " <td>" . $row['cor_mensaje'] . "</td>";
        echo "</tr>";
        }
            } else {
            echo "<tr>";
            echo " <td colspan='7'> No existen mensajes recibidos </td>";
            echo "</tr>";
            }
        ?>
        </table>
    </body>
</html>
