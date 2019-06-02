<!DOCTYPE html>
<html lang="es">
	<?php
		include '../../config/conexionBD.php';
        $codigo = $_GET['codigo'];
    ?>
	<head>
		<title>Enviado!!</title>
		<meta charset="UTF-8">
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximun-scale=1, minimun-scale=1">
		<!-- ESTILOS -->
        <link href="../estilos/estilos2.css" rel="stylesheet" />
		<link href="../estilos/estilosgracias.css" rel="stylesheet" />
	</head>
	
	<body>
		<h1>GRACIAS POR CONTACTARSE CON NOSOTROS</h1>
		<article>Acabas de enviar tu mensaje a uno de nuestros administradores. Tomaremos en cuenta tu opinión</article>
		<section>
		<input style="align=center" type="button" id="button" name="button" value="Regresar" onclick = "location='index.php?codigo=<? php echo $codigo ?>'" />
		</section>
	</body>
</html>