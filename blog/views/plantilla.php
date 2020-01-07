<?php 
require_once 'controllers/blog_controller.php';
include 'common/apiserver.php';
$blog = blog_controller::mostrar_blog_ctr();
$menu = blog_controller::mostrar_categorias_ctr();
$total_articulos = blog_controller::count_total_ctr(null, null);
$paginas_totales = ceil($total_articulos['total']/5);
$articulos_destacados = blog_controller::mostrar_articulos_destacados_ctr();
$pagina_actual = 1;
if (!isset($_GET['pg'])) {
	$pagina_actual = 1;
	$articulos = blog_controller::mostrar_articulos_ctr(1, null, null);
}else {
	$rutas = explode(",", $_GET['pg']);

	if(count($rutas)>1 && is_numeric($rutas[1])){
		$pagina_actual = $rutas[1];
		//echo '<pre class="bg-light">'; print_r($rutas); echo '</pre>';
	}else if (count($rutas)>1 && !is_numeric($rutas[1])) {

	}else if(count($rutas)==1 && is_numeric($rutas[0])){
		$pagina_actual = $_GET['pg'];
		$articulos = blog_controller::mostrar_articulos_ctr($_GET['pg'], null, null);
	}else if (count($rutas)==1 && !is_numeric($rutas[0])) {
		$articulo = blog_controller::mostrar_articulo_ctr("ruta", $rutas[0]);
		if (is_bool($articulo)) {
			//echo '<pre>'; var_dump($articulo); echo '</pre>';
			$articulo = null;
		}else if (is_array($articulo)) {
			$etiquetas = json_decode($articulo['palabras_clave'], true);
			$contenido = $articulo['contenido'];
			$titulo = $articulo['titulo'];
			$fechaArticulo = $articulo['fecha'];
			$portada = $articulo['portada'];
			$description  = $articulo['description'];
			$categoria = $articulo['categoria'];
			$ruta_categoria = $articulo['ruta_categoria'];
		}
		
	}else{
		include_once 'pages/404.php';
	}
}
//echo '<pre class="bg-light">'; print_r($rutas); echo '</pre>';
 ?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<!-- meta datos dinámicos -->
	<?php if (!isset($_GET['pg'])): ?>
		<meta name="title" content="<?php echo $blog['titulo']; ?>">
		<meta name="description" content="<?php echo $blog['descripcion']; ?>">
		<?php $key_words=""; $kw = json_decode($blog['palabras_clave'],true); ?>
		<?php foreach ($kw as $key => $value): $key_words.=$value.", ";?>
		<?php endforeach ?>
		<meta name="keywords" content="<?php echo substr($key_words,0,-2);?>">
	<?php else: $rut = ""; ?>
		<?php foreach ($menu as $key => $value): ?>
			<?php if ($rutas[0] == $value['ruta']): ?>
				<?php $rut = "categorias"; 
					$key_w = $value['palabras_clave']; 
					$title = $value['titulo'];
					$description = $value['description'];
				?>
			<?php endif ?>	
		<?php endforeach ?>
		<?php if ($rut == "categorias"): ?>
			<meta name="title" content="<?php echo $blog['titulo']." ".$title; ?>">
			<meta name="description" content="<?php echo $description; ?>">
			<title><?php echo $blog['titulo']." | ".$title; ?></title>
			<?php $kwords=""; $kw = json_decode($key_w,true); ?>
			<?php foreach ($kw as $key => $val): $kwords.=$val.", ";?>
			<?php endforeach ?>
			<meta name="keywords" content="<?php echo substr($kwords,0,-2);?>">
		<?php elseif(isset($articulo)): ?>	
			<meta name="title" content="<?php echo $blog['titulo']." | ".$titulo; ?>">
			<meta name="description" content="<?php echo $description; ?>">
			<title><?php echo $blog['titulo']." | ".$titulo; ?></title>
			<?php $kwords=""; ?>
			<?php foreach ($etiquetas as $key => $val): $kwords.=$val.", ";?>
			<?php endforeach ?>
			<meta name="keywords" content="<?php echo substr($kwords,0,-2);?>">
			<!-- Opengraph -->
			<meta property="og:site_name" content="<?php echo $blog['titulo']; ?>">
			<meta property="og:title" content="<?php echo $titulo; ?>">
			<meta property="og:description" content="<?php echo $description; ?>">
			<meta property="og:type" content="article">
			<meta property="og:image" content="<?php echo $portada; ?>">
			<meta property="og:url" content="<?php echo $global_apiserver.$titulo; ?>">

		<?php else: ?>
			<meta name="title" content="<?php echo $blog['titulo']; ?>">
			<meta name="description" content="<?php echo $blog['descripcion']; ?>">
			<?php $key_words=""; $kw = json_decode($blog['palabras_clave'],true); ?>
			<?php foreach ($kw as $key => $value): $key_words.=$value.", ";?>
			<?php endforeach ?>
			<meta name="keywords" content="<?php echo substr($key_words,0,-2);?>">
		<?php endif ?>
	<?php endif ?>
	<!-- fin de metadatos dinámicos -->
	<meta name="author" content="José Antonio Ortiz Jiménez">
	<link rel="icon" href="<?php echo $blog['icono']; ?>">
	
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
	<!--
	<div id="fb-root"></div>
	<script async defer crossorigin="anonymous" src="https://connect.facebook.net/es_LA/sdk.js#xfbml=1&version=v5.0"></script>
	-->
	<?php
		include 'pages/modulos/header.php';
		include 'pages/modulos/redes-sociales-movil.php';
		include 'pages/modulos/buscador-movil.php';
		include 'pages/modulos/menu.php';

		/*================================================
		=            navegación entre páginas            =
		================================================*/
		if(!isset($_GET['pg'])){
			include_once 'pages/inicio.php';
		}else{
			if(count($rutas)>1 && is_numeric($rutas[1])){
				$inc = "";
				foreach ($menu as $key => $value) {
					if ($rutas[0] == $value['ruta']){
						$inc = "categorias";
					}	
				}

				if ($inc == "categorias") {
					include_once 'pages/categorias.php';
				}else {
					include_once 'pages/404.php';
				}
			}else if (count($rutas)>1 && !is_numeric($rutas[1])) {
				
			}else if(count($rutas)==1 && is_numeric($rutas[0])){
				if ($rutas[0]<=$paginas_totales) {
					include_once 'pages/inicio.php';
				}else {
					include_once 'pages/404.php';
				}
			}else if (count($rutas)==1 && !is_numeric($rutas[0])) {
				if ($rut == "categorias") {
					include_once 'pages/categorias.php';
				}else {
					//echo '<pre>'; print_r($articulo); echo '</pre>';
					if (isset($articulo)) {
						include_once 'pages/articulos.php';
					}else{
						include_once 'pages/404.php';
					}
				}
				/* aquí deberia revisar si no quieres visualizr un articulo */
			}else{
				include_once 'pages/404.php';
			}
		}

		/*=====  End of navegación entre páginas  ======*/
		
		include 'pages/modulos/footer.php';
	?>

	<script src="common/apiserver.js"></script>
	<?php if (isset($articulo)): ?>
		<script src="views/js/plugins/shape.share.js"></script>
	<?php endif ?>
	<script src="views/js/script.js"></script>
</body>
</html>