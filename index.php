<?php 
    require_once "menu.php";
    ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, user-scalable=no, 
	initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
	<link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600' rel='stylesheet' type='text/css'>
	<link rel="stylesheet" href="css/estilos.css">
	<link rel="stylesheet" href="css/font-awesome.min.css">
	<title>Acerca de Jan Leyte</title>
</head>
<body>
	<div class="contenedor" id="contenedor">
		<section class="tarjeta">
			<div class="slider_banner">
				<div class="banner" id="banner">
					<img class="slide active" src="img/banner.jpg" alt="">
					<img class="slide" src="img/banner2.jpg" alt="">
					<img class="slide" src="img/banner3.jpg" alt="">
					<img class="slide" src="img/banner4.jpg" alt="">
				</div>

				<!-- Flechas del Banner -->
				<a href="#" id="banner-prev" class="flecha-banner anterior"><span class="fa fa-chevron-left"></span></a>
				<a href="#" id="banner-next" class="flecha-banner siguiente"><span class="fa fa-chevron-right"></span></a>
			</div>

			<section class="slider_info">
				<!-- Flechas del Slider -->
				<a href="#" id="info-prev" class="flecha-info anterior" ><span class="fa fa-chevron-left"></span></a>
				<a href="#" id="info-next" class="flecha-info siguiente"><span class="fa fa-chevron-right"></span></a>

				<section class="informacion" id="informacion">
					<article id="info">
						<div class="slide active">
							<h1 class="nombre">My Name is Blue V</h1>
							<p class="trabajo">Desarrollador Web</p>
							<p class="pais"><img src="img/bandera.png" alt="">Mexico</p>
						</div>
					
						<div class="slide">
							<h1 class="nombre">Jose Antonio</h1>
							<p class="trabajo">Desarrollador Web</p>
							<p class="pais"><img src="img/bandera.png" alt="">Mexico</p>
						</div>

						<div class="slide">
							<h1 class="nombre">Jonathan Estrada</h1>
							<p class="trabajo">Desarrollador Web</p>
							<p class="pais"><img src="img/bandera.png" alt="">Mexico</p>
						</div>
					</article>
					<div class="botones" id="botones"></div>
				</section>

			</section>
			<section class="redes-sociales">
				<a href="#" class="behance"><span class="fa fa-behance"></span></a>
				<a href="#" class="facebook"><span class="fa fa-facebook"></span></a>
				<a href="#" class="twitter"><span class="fa fa-twitter"></span></a>
			</section>
		</section>
	</div>

	<script src="https://code.jquery.com/jquery-3.0.0.min.js"></script>
	<script src="js/main.js"></script>
</body>
</html>