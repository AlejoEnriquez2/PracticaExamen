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
    <title>Comprar</title>
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
        font-size: 35px;
    }

    .exito {
        color: green;
    }

    div a {
        text-decoration: none;
        color: black;
        border-style: solid;
        border-color:black;
        border-radius: 15px;
        margin: 20px 0;
    }
    </style>
</head>

<body>

    <?php
    
        include '../../../config/conexionBD.php';
        
        $codigo=$_GET["id"];
        $codigoU=$_GET["id_juego"];

    
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
        $sqlfinal="DELETE FROM carritos WHERE car_jue_codigo = $codigoU and car_usu_codigo = $codigo";
        if($conn->query($sqlfinal) === TRUE) {
            echo "<div>";
                echo "<p class='exito'>Has eliminado el juego exitosamente</p>";
                echo "<a codigo=link href=../vista/carro_compras.php?id=".$codigo.">Volver</a>";
            echo "</div>";
        }else{
            if($conn->errno == 1062){
            }else{
                echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
            }
        }
        ?>

</body>

</html>