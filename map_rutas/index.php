<?php 
    
	include_once('class/google.php');
	$google = new Google;
?>
<!DOCTYPE html >
<html>
<head>
	<title>Google Maps - Rutas</title>
	<meta charset="utf8_general_ci">
	<link rel="stylesheet" type="text/css" href="../map_rutas/css/base.css">
	<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA9PzcEI7CfqittLmMseZcvwpgeawwdbxE&sensor=false&language=es"></script>
	<script type="text/javascript" src="../map_rutas/js/jquery.js"></script>
	<script type="text/javascript" src="../map_rutas/js/functions.js"></script>
</head>
<body>
	<div class="container">
		<table class="table-elements">
			<tr>
				<td>
					<input type="button" value="Obtener mi ubicacion - A" onclick="get_my_location();" class="btn">
				</td>
				<td>
					<input type="text" placeholder="Latitud" id="my_lat" class="txt" readonly>
				</td>
				<td>
					<input type="text" placeholder="Longitud" id="my_lng" class="txt" readonly>
				</td>
				<td>
					<select class="txt" onchange="draw_rute(this.value)">
						<option value="0">Dibujar ruta con &#8595;</option>
						<?=$google->get_stores();?>
					</select>
				</td>
			</tr>
		</table>
		<div class="map" id="map"></div>
	</div>
	<script type="text/javascript">
		start_map();
	</script>
</body>
</html>