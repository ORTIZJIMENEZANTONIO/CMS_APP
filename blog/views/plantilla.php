<?php 
require_once 'controllers/blog_controller.php';
$blog = blog_controller::mostrar_blog_ctr();

echo '<pre>'; print_r($blog); echo '</pre>';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<meta name="title" content="Antonio project">
	<meta name="description" content="Es un blog que se hizo a raíz de un ttutorial de php">
	<meta name="keywords" content="cms con php, prueba de php">
	<meta name="author" content="José Antonio Ortiz Jiménez">
	<title>Antonio Blog</title>
	<link rel="icon" href="views/img/icono.jpg">


	<!--=====================================
	PLUGINS DE CSS
	======================================-->
	
	<!-- Latest compiled and minified CSS -->
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css">

	<link href="https://fonts.googleapis.com/css?family=Chewy|Open+Sans:300,400" rel="stylesheet">

	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.6.0/css/all.css" integrity="sha384-aOkxzJ5uQz7WBObEZcHvV5JvRW3TUc2rNPA7pe3AwnsUohiw1Vj2Rgx2KSOkF5+h" crossorigin="anonymous">

	<!-- JdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<link rel="stylesheet" href="views/css/plugins/jquery.jdSlider.css">
	<link rel="stylesheet" href="views/css/style.css">

	<!--=====================================
	PLUGINS DE JS
	======================================-->

	<!-- jQuery library -->
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

	<!-- Popper JS -->
	<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js"></script>

	<!-- Latest compiled JavaScript -->
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js"></script>

	<!-- JdSlider -->
	<!-- https://www.jqueryscript.net/slider/Carousel-Slideshow-jdSlider.html -->
	<script src="views/js/plugins/jquery.jdSlider-latest.js"></script>
	
	<!-- pagination -->
	<!-- http://josecebe.github.io/twbs-pagination/ -->
	<script src="views/js/plugins/pagination.min.js"></script>

	<!-- scrollup -->
	<!-- https://markgoodyear.com/labs/scrollup/ -->
	<!-- https://easings.net/es# -->
	<script src="views/js/plugins/scrollUP.js"></script>
	<script src="views/js/plugins/jquery.easing.js"></script>

</head>

<body>
	<?php
		include 'pages/modulos/header.php';
		include 'pages/modulos/redes-sociales-movil.php';
		include 'pages/modulos/buscador-movil.php';
		include 'pages/modulos/menu.php';

		/*================================================
		=            navegación entre páginas            =
		================================================*/
		
		include 'pages/inicio.php';
		
		/*=====  End of navegación entre páginas  ======*/
		
		


		include 'pages/modulos/footer.php';
	?>
	<script src="views/js/script.js"></script>
</body>
</html>