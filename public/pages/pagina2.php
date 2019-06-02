<?php
    include '../../config/conexionBD.php';
    $codigo = $_POST["codigo"];
    $asunto = isset($_POST["asunto"]) ? mb_strtoupper(trim($_POST["asunto"]), 'UTF-8') : null;
    $mensaje = isset($_POST["mensaje"]) ? mb_strtoupper(trim($_POST["mensaje"]), 'UTF-8') : null;
    $codigo_destino;

    date_default_timezone_set("America/Guayaquil");
    $fecha = date('Y-m-d H:i:s',time());

    $sql = "SELECT usu_codigo FROM usuarios WHERE usu_rol_id=1";
    $result = $conn->query($sql);

    if ($result->num_rows > 0){
        while($row = $result->fetch_assoc()){
            $codigo_destino=$row["usu_codigo"];
        }
    }else{
        echo "No existen usuarios registrados en el sistema";
    }
    echo $codigo_destino;
	

    $sql1 = "INSERT INTO correo VALUES (0, '$codigo', '2', '$asunto', '$mensaje', '$fecha', 'N', null, null);";
	echo $sql1;
    if ($conn->query($sql1)==FALSE){
        echo"<p class='error'>Error: " .mysqli_error($conn)."</p>";
    }
    $conn->close();

header("Location: /PracticaExamen/public/pages/gracias.html?codigo=".$codigo);
?>