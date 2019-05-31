<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Modificar datos de persona</title>
    </head>
    <body>
        <form class="box">
        <?php
            //Incluir conexion a la base de datos
            include '../../config/conexionBD.php';
            $codigo_admin = $_GET["codigo_admin"];

            $codigo = $_POST["codigo"];
            $cedula = isset($_POST["cedula"]) ? trim($_POST["cedula"]) : null;
            $nombres = isset($_POST["nombres"]) ? mb_strtoupper(trim($_POST["nombres"]), 'UTF-8') : null;
            $apellidos = isset($_POST["apellidos"]) ? mb_strtoupper(trim($_POST["apellidos"]), 'UTF-8') : null;
            $correo = isset($_POST["correo"]) ? trim($_POST["correo"]) : null;
            $fechaNacimiento = isset($_POST["fechaNacimiento"]) ? trim($_POST["fechaNacimiento"]) : null;

            date_default_timezone_set("America/Guayaquil");
            $fecha = date('Y-m-d H:i:s',time());

            $sql = "UPDATE usuarios SET usu_cedula = '$cedula', usu_nombres = '$nombres', usu_apellidos = '$apellidos', usu_correo = '$correo', usu_fecha_nac = '$fechaNacimiento', usu_fecha_modificacion = '$fecha' WHERE usu_codigo = $codigo";
            
            if ($conn->query($sql) == TRUE){
                echo "Se ha actualizado los datos personales correctamente!!!<br>";
            }else{
                echo "Error: ".$sql."<br>".mysqli_error($conn)."<br>";
            }
            echo "<a href='/PracticaExamen/admin/vista/index.php?codigo_admin=".$codigo_admin."'>Regresar</a>";

            $conn->close();
        ?>
        </form>
    </body>
</html>