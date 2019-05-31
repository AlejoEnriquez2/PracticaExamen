<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
            <title>Gestión de usuarios</title>
    </head>
<body>

<h3>Usuarios Registrados</h3>

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
 $sql = "SELECT * FROM usuarios";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
 echo "<tr>";
 echo " <td>" . $row["usu_cedula"] . "</td>";
 echo " <td>" . $row['usu_nombres'] ."</td>";
 echo " <td>" . $row['usu_apellidos'] . "</td>";
 echo " <td>" . $row['usu_correo'] . "</td>";
 echo " <td>" . $row['usu_fecha_nac'] . "</td>";
 echo " <td> <a href='eliminar.php?codigo=" . $row['usu_codigo'] . "'>Eliminar</a> </td>";
 echo " <td> <a href='modificar.php?codigo=" . $row['usu_codigo'] . "'>Modificar</a> </td>";
 echo " <td> <a href='cambiar_contrasena.php?codigo=" . $row['usu_codigo'] . "'>Cambiar
contraseña</a> </td>";
 echo "</tr>";
}
    } else {
    echo "<tr>";
    echo " <td colspan='7'> No existen usuarios registradas en el sistema </td>";
    echo "</tr>";
    }
 $conn->close();
 ?>
 </table>
	
<h3>Juegos Registrados</h3>
	
<table style="width:100%">
    <tr>
        <th>Titulo</th>
        <th>Descripcion</th>
        <th>Imagen</th>
        <th>Precio</th>
        <th>Fecha</th>
    </tr>
     
     
 <?php
 include '../../config/conexionBD.php';
 $sql = "SELECT * FROM juegos";
 $result = $conn->query($sql);

 if ($result->num_rows > 0) {

while($row = $result->fetch_assoc()) {
 echo "<tr>";
 echo " <td>" . $row["jue_nombre"] . "</td>";
 echo " <td>" . $row['jue_descripcion'] ."</td>";
 echo " <td>" . $row['jue_imagen'] . "</td>";
 echo " <td>" . $row['jue_precio'] . "</td>";
 echo " <td>" . $row['jue_fecha'] . "</td>";
 echo " <td> <a href='eliminar.php?codigo=" . $row['jue_codigo'] . "'>Eliminar</a> </td>";
 echo " <td> <a href='modificar.php?codigo=" . $row['jue_codigo'] . "'>Modificar</a> </td>";
 echo "</tr>";
}
    } else {
    echo "<tr>";
    echo " <td colspan='7'> No existen juegos registradas en el sistema </td>";
    echo "</tr>";
    }
 $conn->close();
 ?>
 </table>
	
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
 echo "<td>". $row["cor_usu_remite"]."</td>";
 echo "<td>". $row["cor_usu_destino"]."</td>";
 echo " <td>" . $row['cor_asunto'] . "</td>";
 echo " <td>" . $row['cor_mensaje'] . "</td>";
 echo "</tr>";
}
    } else {
    echo "<tr>";
    echo " <td colspan='7'> No existen mensajes recibidos </td>";
    echo "</tr>";
    }
 $conn->close();
 ?>
 </table>
</body>
</html>