<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: ../../../public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Carrito</title>
    <style type="text/css">
    body {
        background-image: url('../vista/images/fondo.jpg');
        background-size: cover;
        background-attachment: fixed;
    }

    div {
        background: #eaeaea;
        font-size: 25px;
        display: inline-block;
        text-align: center;
        margin-left: 50vh;
        margin-top: 50vh;
        padding: 0 20px;
        padding-bottom: 25px;
        border-radius: 6px;
        border: 2px solid #999;
    }

    .error {
        color: red;
    }

    .exito {
        color: green;
        font-size: 35px;
    }

    div a {
        text-decoration: none;
        color: black;
        border-style: solid;
        border-color: black;
        border-radius: 15px;
        margin: 20px 0;
    }
    </style>
</head>

<body>

    <?php
    
        include '../../config/conexionBD.php';
        
        $codigo=$_SESSION['codigo'];
        $codigoU=$_GET["id_juego"];
        $cantidad = isset($_POST["cantidad"]) ? trim($_POST["cantidad"]): null;
    
        $sql ="SELECT *
        FROM usuarios
        WHERE usu_codigo=$codigo";
    
        $result=$conn->query($sql);
        $row = $result->fetch_assoc();
    
        $sqlu ="SELECT *
               FROM juegos
               WHERE jue_codigo=$codigoU";
    
        $resultu=$conn->query($sqlu);
        $rowu = $resultu->fetch_assoc();
        
    ?>


    <?php
            $sql ="INSERT INTO carritos values(0,$codigo,$codigoU,$cantidad)"; 
            
            if($conn->query($sql)==TRUE){
                echo "<div>";
                            echo "<p class='exito'>El juego se añadio correctamente a tu carrito</p>";
                            echo "<a href=/PracticaExamen/public/pages/index.php>Regresar</a>";
                echo "</div>";
            }else{
                echo "<div>";
                            echo "<p class='exito'>Lo siento ocurrio un error</p>";
                            echo "<a href=/PracticaExamen/public/pages/index.php>Regresar</a>";
                echo "</div>";
            }
        ?>

</body>

</html>