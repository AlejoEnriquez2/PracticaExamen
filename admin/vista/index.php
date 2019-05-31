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
	
<h3>Mensajes Electronicos</h3>
	
<table id="buzon">
   <tr>
       <th>Fecha</th>
       <th>Remite</th>
       <th>Destinatario</th>
       <th>Asunto</th>
       <th>Accion</th>
   </tr>
	
   <?php
       include '../../config/conexionBD.php';
       $sql1 = "SELECT * FROM correo";
       $result1 = $conn->query($sql);
                        

if ($result1->num_rows > 0){
		   
while($row1 = $result1->fetch_assoc()){
	
          if($row1["cor_eliminado"]!='S'){
                                    echo "<tr>";
                                    echo "<td>" .$row1["cor_fecha_envio"]."</td>";
                                    echo "<td>".buscarCorreo($row1["cor_usu_remite"])."</td>";
                                    echo "<td>".buscarCorreo($row1["cor_usu_destino"])."</td>";
                                    echo "<td>" .$row1["cor_asunto"]."</td>";
                                }
                            }
                        }else{
                            echo "<td colspan=4>No hay mensajes electronicos</td>";
                        }

                        function buscarCorreo($codigoCorreo){
                            include '../../config/conexionBD.php';
                            $sql1 = "SELECT usu_correo FROM usuarios WHERE usu_codigo='$codigoCorreo'";
                            $result1 = $conn->query($sql1);
                            if($result1->num_rows > 0){
                                while($row1 = $result1->fetch_assoc()){
                                    $direccionCorreo=$row["usu_correo"];
                                }
                            }
                            return $direccionCorreo;
                        }

                        

                        $conn->close();
                    ?>
                </table>
</body>
</html>