<!--=====================================
Resultados del buscador
======================================-->
<?php 
	$total_articulos = blog_controller:: count_busquedas_ctr($rutas[0]);
	$paginas_totales = ceil($total_articulos['total']/5);
	//$paginas_actual = 1; echo '<pre>'; var_dump($paginas_totales); echo
	//'</pre>';

 ?>

<div class="container-fluid bg-white pb-4">
	
	<div class="container">
		
		<div class="row">

			<!-- COLUMNA IZQUIERDA -->
			<?php if ($total_articulos>0):?>
				<div class="col-12 col-md-10 col-lg-10 p-0 pr-lg-5 mt-3">
					<?php foreach ($articulos as $key => $value): ?>
						<div class="row">

							<div class="col-12 col-lg-5">

								<a href="<?php echo $value['ruta']; ?>"><h5 class="d-block d-lg-none py-3"><?php echo $value['titulo']; ?></h5></a>

								<a href="<?php echo $value['ruta']; ?>"><img src="<?php echo $value['portada']; ?>" alt="<?php echo $value['titulo']; ?>" class="img-fluid" width="100%"></a>

							</div>

							<div class="col-12 col-lg-7 introArticulo">

								<a href="<?php echo $value['ruta']; ?>"><h4 class="d-none d-lg-block"><?php echo $value['titulo']; ?></h4></a>

								<p class="my-2 my-lg-5"><?php echo $value['description']; ?></p>

								<a href="<?php echo $value['ruta']; ?>" class="float-right">Leer Más</a>

								<div class="fecha"><?php echo $value['fecha_articulo']; ?></div>

							</div>

						</div>

						<hr class="mb-4 mb-lg-5" style="border: 1px solid #79FF39">
					<?php endforeach ?>
					<!-- ARTÍCULOS -->

					<!-- PUBLICIDAD -->

					<div class="d-block d-lg-none">

						<img src="views/img/ad02.jpg" class="img-fluid" width="100%">

					</div>


					<div class="container d-none d-md-block">

						<ul class="pagination justify-content-center" total_paginas="<?php echo $paginas_totales; ?>" pagina_actual="<?php echo $pagina_actual; ?>"></ul>

					</div>
				</div>
			<?php else: ?>
				<div class="col-12 col-md-10 col-lg-10 p-0 p-lg-1">
					<p class="display-4">No se encontraron artículos relacionados</p>
				</div>
				<div class="col-0 col-md-2 col-lg-2 p-0 m-lg-2">
					<p class="display-4">artículos relacionados</p>
				</div>
				<div class="col-12 d-flex mt-3 pb-5 ">
					<button type="" class="btn btn-info m-auto" onclick="window.location = global_apiserver">
						volver
					</button>
				</div>
			<?php endif ?>

		</div>

	</div>

</div>