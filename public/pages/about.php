<!DOCTYPE html>
<html>
	<head>
		<meta charset=UTF-8 />
		<title>Acerca de nosotros</title>
		<!-- ESTILOS -->
		<link rel="stylesheet" href="/PracticaExamen/public/estilos/estilos.css" type="text/css">	
		<link rel="shortcut icon" href="/PracticaExamen/public/images/icono.png">
	</head>
	
	<body>

		<header>
			
		</header>
		<table>
			<tr>
				<td>
					<caption><a href="/PracticaExamen/public/pages/index.php"><img width="6%" style="float:left" src="../images/back.png"></a><h1 align="left">QUIENES SOMOS?</h1></caption>
				</td>
			</tr>
			
			<tr>
				<td>
				
					<caption><img id="ima" src="images/videojuegos.png" alt="imagen1" align="left"/><article class="a"><p><strong>MADGAMES</strong> es la mejor página de venta y distribución de videojuegos. Contamos con un gran catalogo de titulos de todo tipo de genero y 
					para cualquier tipo de plataforma, con una cantidad de casi 30000 juegos publicados; desde grandes compañias hasta estudios independientes,
					además de traer siempre a nuestros miembros los ultimos titulos del mercado. Nos caracterizamos por nuestros bajos precios que estan siempre
					al alcance de cualquier bolsillo, sin mencionar nuestras numerosas promociones y descuentos.</p></article>
					</caption>
					
				</td>
			</tr>
			
			<tr>
				<td>
					<article class="a">
					<h1>MISION</h1>
					<p>Satisfacer las necesidades de las personas interesadas en los videojuegos y articulos de novedad, prestandoles el mejor servicio por parte de todo el personal de la empresa, y manteniendo siempre actualizado nuestro catálogo de juegos y articulos para las diferentes plataformas, haciendo que seamos la principal eleccion cuando de comprar videojuegos se trata.</p>
					</article>
				</td>
				
				<td>
					<article class="a">
					<h1>VISION</h1>
					<p>Llegar a más lugares del Ecuador e incluso a diferentes partes del mundo, destacandonos por ofrecer el mejor servicio al cliente, con los juegos y artículos más nuevos y actualizados y principalmente con la mejor comodidad y seguridad del mundo.</p>
					</article>
				</td>
			</tr>
			
			<tr>
				<td colspan="2">
					<h1>Google Maps - Ubicaciones</h1>
					<?php 
						include_once('map_rutas/class/google.php');
						$google = new Google;
					?>
					<script type="text/javascript" src="http://maps.google.com/maps/api/js?key=AIzaSyA9PzcEI7CfqittLmMseZcvwpgeawwdbxE&sensor=false&language=es"></script>
					<script type="text/javascript" src="/PracticaExamen/public/pages/map_rutas/js/jquery.js"></script>
					<script type="text/javascript" src="/PracticaExamen/public/pages/map_rutas/js/functions.js"></script>

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
					<div class="map" id="map">
						<script type="text/javascript">
							start_map();
						</script>	
					</div>
				</div>
			</td>
			</tr>
		
		</table>
	</body>
	<footer class="pie">
            <h2>Universidad Politécnica Salesiana</h2>
            <h4>Desarrollado por: <em> &#8226; David Cornejo &#8226; Alejandro Enríquez &#8226; Paulo Gonzalez &#8226; Angel Ruiz &#8226; Evelyn Pintado</em></h4>
            <h6> <sub>&#169;</sub> <em> Todos los derechos reservados</em></h6>
       </footer>
</html>