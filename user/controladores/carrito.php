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
        border: 1px solid #999;
    }

    .error {
        color: red;
    }

    .exito {
        color: green;
        font-size: 35px;
    }

    div a {
        font-family: arial;
        text-decoration: none;
        color: black;
        border-style: solid;
        border-color: black;
        border-radius: 15px;
        margin: 20px 0;
    }

    .boton{
        font-family: arial;
        font-size: 23px;
        background: #eaeaea;
        text-decoration: none;
        color: black;
        border-style: solid;
        border-color: black;
        border-radius: 15px;
        border-width: 3px;
        margin: 20px 0;
    }
    </style>
</head>

<body>

    <?php
    
        include '../../config/conexionBD.php';
        
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
        $sqlw="SELECT *
                FROM carritos
                WHERE car_usu_codigo=$codigo and car_jue_codigo=$codigoU";
        $resultu=$conn->query($sqlw);
        if($resultu->num_rows > 0){ 
            echo "<div>";
                echo "<p class='exito'>El juego ya se encuentra en tu carrito</p>";
                echo "<a href=../vista/juego.php?id=".$codigo.">Regresar</a>";
            echo "</div>";
        }else{
            echo "<div>";
                echo "<form method='post' action='carrito2.php?id=".$codigo."&id_juego=".$codigoU."' class='form login' enctype='multipart/form-data'>";
                echo "<p class='exito'>Ingrese la cantidad de juegos: <input type='text' placeholder='cantidad' id='cantidad' name='cantidad' value='1'></p>";
                echo "<a href=../vista/juego.php?id=".$codigo."> Cancelar </a>";
                echo "<input class='boton' type='submit' value=' Aceptar'>";
                echo "</form>";
            echo "</div>";
        }
        ?>

</body>

</html>