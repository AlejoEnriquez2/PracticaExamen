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
        date_default_timezone_set("America/Guayaquil");

        
        $codigo=$_GET["id"];
        $codigoU=$_GET["total"];
        $cjuego=0;
        $cantidad=0;
        $cfac=0;    
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

        $fecha = date("y-m-d h:i:s",time());

        
    ?>


    <?php
            if($codigoU>$row["usu_dinero"]){
                echo "<div>";
                    echo "<p class='exito'>Lo siento te falta dinero</p>";
                    echo "<a codigo=link href=../vista/carro_compras.php?id=".$codigo.">Volver</a>";
                echo "</div>";
               
            }else{
                $nuevoDinero=$row["usu_dinero"]-$codigoU;
                $sqls="UPDATE usuarios SET usu_dinero = $nuevoDinero WHERE usuarios.usu_codigo = $codigo";
                
                if($conn->query($sqls) === TRUE) {

                    $sqlg="INSERT INTO facturas VALUES(0,'$fecha',$codigo)";
                    if($conn->query($sqlg) === TRUE) {
                        $sqlh="SELECT *
                                FROM facturas
                                WHERE fac_usu_codigo=$codigo";
                        $result=$conn->query($sqlh);
                        if($result->num_rows > 0){
                            while($rowh = $result->fetch_assoc()){
                                $cfac = $rowh["fac_codigo"];
                            }
                        }else{
                            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                        }
                        $sqlj ="SELECT *
                        FROM carritos,
                            juegos
                        where car_usu_codigo=$codigo and jue_codigo = car_jue_codigo";
        
                        $result = $conn->query($sqlj);
                        if($result->num_rows > 0){
                                 while($rowj = $result->fetch_assoc()){
                                     $cjuego=$rowj["jue_codigo"];
                                     $cantidad =$rowj["car_cantidad"];
                                    $sqlk = "INSERT INTO facturas_detalle VALUES(0,$cjuego,$cantidad,$cfac)";
                                    if($conn->query($sqlk) === TRUE) {
                                    }else{
                                        if($conn->errno == 1062){
                                        }else{
                                            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                                        }
                                    }
                                 }  
                        }else{
                            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                        }
                    }else{
                        if($conn->errno == 1062){
                        }else{
                            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                        }
                    }



                    $sqlfinal="DELETE FROM carritos WHERE  car_usu_codigo = $codigo";
                    if($conn->query($sqlfinal) === TRUE) {
                        echo "<div>";
                            echo "<p class='exito'>Has comprado el juego exitosamente</p>";
                            echo "<a codigo=link href=../vista/carro_compras.php?id=".$codigo.">Volver</a>";
                        echo "</div>";
                    }else{
                        if($conn->errno == 1062){
                        }else{
                            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                        }
                    }
                } else {
                    if($conn->errno == 1062){
                        }else{
                            echo "<p class='error'>Error: " . mysqli_error($conn) . "</p>";
                        }
                } 
            }
        ?>

</body>

</html>