<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /PracticaExamen/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
<?php
	include '../../config/conexionBD.php';
    $codigo = $_SESSION['codigo'];
?>
	<head>
		<meta charset="UTF-8"> 
		<title>Contactanos</title>
		<!-- ESTILOS -->
        <link href="../estilos/estilos2.css" rel="stylesheet" />
		<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	</head>
	
	<body>
	<header class="cabecera">
            <a href="/PracticaExamen/public/pages/index.php">
                <div class="logo">
                    <img src="/PracticaExamen/public/images/logo.png">
                    <h2>MadGames</h2>
                </div>
            </a>
            <div class="menu">
                <ul class="navegacion">
                    <li>
                        <a href="/PracticaExamen/public/pages/index.php">Juegos</a>
                        <ul>
                            <li><a href="/PracticaExamen/public/pages/puntaje.php">Mejores&nbsp;Puntuaciones</a></li>
                            <li><a href="/PracticaExamen/public/pages/novedades.php">Novedades</a></li>
                            <li><a href="#">Categorías</a>
                                <ul style="top: 113px">
                                    <li><a href="/PracticaExamen/public/pages/categoria.php?cat=1">Accion</a></li>
                                    <li><a href="/PracticaExamen/public/pages/categoria.php?cat=2">Terror</a></li>
                                    <li><a href="/PracticaExamen/public/pages/categoria.php?cat=3">Deporte</a></li>
                                    <li><a href="/PracticaExamen/public/pages/categoria.php?cat=4">Rol</a></li>
                                </ul>
                            </li>
                        </ul>
                    </li>
                    <li>
                        <a href="/PracticaExamen/public/pages/index.php">Ofertas</a>
                        <ul>
                            <li><a href="/PracticaExamen/public/pages/mejores.php">Mejores</a></li>
                            <li><a href="/PracticaExamen/public/pages/gratis.php">Free2Play</a></li>
                        </ul>
                    </li>
                    <li>
                        <a>About</a>
                        <ul>
                            <li><a href="/PracticaExamen/public/pages/about.php">Quienes&nbsp;Somos</a></li>
                            <li><a href="/PracticaExamen/public/pages/contacto.php">Contacto</a></li>
                        </ul>
                    </li>
                    <?php
                        if(isset($_SESSION['isLogged']) === TRUE){
                            if($_SESSION['rol'] == 2){
                                echo '<li><a href="/PracticaExamen/user/vista/carro_compras.php">Carrito</a></li>';
                            }
                            if($_SESSION['rol'] == 1){
                                echo '<li><a href="/PracticaExamen/public/pages/index.php">Carrito</a></li>';
                            }
                        }else{
                            echo '<li><a href="/PracticaExamen/public/vista/login.html">Carrito</a></li>';
                        }
                            
                    ?>
                <li>
                    <input class="busqueda" type="text" id="juego" value="">
                    <input class="boton" type="button" id="buscar" name="buscar" value="Buscar" onclick="buscar()">
                    <!--<img class="iB" src="../images/search.png">-->
                </li>
            </ul>
		</div>
		</header>
		
		<h1>CONTÁCTANOS</h1>
		<form method="post" action="pagina2.php?codigo=<?php echo $codigo ?>">
		<input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">
		<table id="contacto" borderalign="center">
			
			<tr>
				<td>From:</td>
				<td colspan="2"><input style="background-color:aliceblue;" id="text" type="text" id="remite" name="remite" value="<?php echo buscarCorreo($codigo) ?>" disabled></td>
			</tr>
			
			<tr>
				<td>Asunto:</td>
				<td colspan="2"><textarea name="asunto" id="asunto" rows="2" cols="100" id="textview" type="text" required></textarea></td>
			</tr>
							
			<tr>
				<td colspan="2"><textarea name="mensaje" id="mensaje" rows="10" cols="114" id="textview" type="text" required></textarea></td>
			</tr>
			
			<tfoot>
				<tr>
					<td align="center"><input id="button" type="submit" value="ENVIAR"></td>
					<td align="center"><input id="button" type="reset" value="CANCELAR"></td>
					
				</tr> 
			</tfoot>	
		</table>
		</form>
	</body>
</html>

<?php
    function buscarCorreo($codigoCorreo){
        include '../../config/conexionBD.php';
        $sql = "SELECT usu_correo FROM usuarios WHERE usu_codigo='$codigoCorreo'";
        $result = $conn->query($sql);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $direccionCorreo=$row["usu_correo"];
            }
        }
        return $direccionCorreo;
    }
?>