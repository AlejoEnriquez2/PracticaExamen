<?php
    session_start();
    if(!isset($_SESSION['isLogged']) || $_SESSION['isLogged'] === FALSE){
        header("Location: /PracticaExamen/public/vista/login.html");
    }
?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8"> 
		<title>Contactanos</title>
		<!-- ESTILOS -->
        <link href="../estilos/estilos2.css" rel="stylesheet" />
		<meta http-equiv=”Content-Type” content=”text/html; charset=UTF-8″ />
	</head>
	
	<body>
		<?php
            include '../../config/conexionBD.php';
            $codigo = $_GET['codigo'];
        ?>
		
		<h1>CONTÁCTANOS</h1>
		<form method="post" action="pagina2.php?codigo=".$codigo>
		<input type="hidden" id="codigo" name="codigo" value="<?php echo $codigo ?>">
		<table id="contacto" border align="center">
			
			<tr>
				<td>From:</td>
				<td colspan="2"><textarea name="remite" id="remite" rows="1" cols="100" id="textview" type="text" value="<?php echo buscarCorreo($codigo) ?>" required></textarea></td>
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
					<td align="center"><input id="button" type="button" value="CANCELAR"></td>
					
				</tr> 
			</tfoot>	
		</table>
		</form>
	</body>
</html>

<?php
    function buscarCorreo($codigoCorreo){
        include '../../config/conexionBD.php';
        $sql1 = "SELECT usu_correo FROM usuarios WHERE usu_codigo='$codigoCorreo'";
        $result = $conn->query($sql1);
        if($result->num_rows > 0){
            while($row = $result->fetch_assoc()){
                $direccionCorreo=$row["usu_correo"];
            }
        }
        return $direccionCorreo;
    }
?>