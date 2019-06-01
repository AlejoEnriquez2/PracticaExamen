<!DOCTYPE html>
<html>
    <head></head>
    <body>
    <table style="width:100%">
		<tr>
			<th>Cedula</th>
			<th>Nombres</th>
			<th>Apellidos</th>
			<th>Correo</th>
			<th>Fecha Nacimiento</th>
		</tr>
        
        <?php
            include '../../config/conexionBD.php';
            $sql = "SELECT * FROM usuarios WHERE usu_eliminado='N'";
            $result = $conn->query($sql);

            if ($result->num_rows > 0) {
                while($row = $result->fetch_assoc()) {
                echo "<tr>";
                echo " <td>" . $row["usu_cedula"] . "</td>";
                echo " <td>" . $row['usu_nombres'] ."</td>";
                echo " <td>" . $row['usu_apellidos'] . "</td>";
                echo " <td>" . $row['usu_correo'] . "</td>";
                echo " <td>" . $row['usu_fecha_nac'] . "</td>";
                echo " <td> <a style='color:white' href='/PracticaExamen/admin/vista/modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
                echo " <td> <a style='color:white' href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar
                contraseña</a> </td>";
                echo "</tr>";
            }
            } else {
                echo "<tr>";
                echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
                echo "</tr>";
            }
        ?>
         </table>
    </body>
</html>
