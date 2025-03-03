<!--=====================================
CONTENIDO INICIO
======================================-->

<div class="container-fluid bg-white contenidoInicio pb-4">
	
	<div class="container">
		
		<div class="row">
			
			<!-- COLUMNA IZQUIERDA -->

			<div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">
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
				<!-- ARTÍCULO 01 -->

				<!-- PUBLICIDAD -->

				<div class="d-block d-lg-none">
					
					<img src="views/img/ad02.jpg" class="img-fluid" width="100%">

				</div>


				<div class="container d-none d-md-block">
					
					<ul class="pagination justify-content-center" total_paginas="<?php echo $paginas_totales; ?>" pagina_actual="<?php echo $pagina_actual; ?>"></ul>

				</div>

			</div>

			<!-- COLUMNA DERECHA -->

			<div class="d-none d-md-block pt-md-4 pt-lg-0 col-md-4 col-lg-3">

				<!-- SOBRE MI -->

				<div class="sobreMi">
					
					<h4>Sobre Mi</h4>

					<img src="views/img/sobreMi.jpg" alt="Lorem ipsum dolor sit amet" class="img-fluid my-1">

					<p class="small"><?php echo $blog['sobre_mi_completo']; ?></p>

				</div>

				<!-- Artículos destacados -->

				<div class="my-4">
					
					<h4>Artículos Destacados</h4>

					<?php foreach ($articulos_destacados as $key => $value): ?>
						<div class="d-flex my-3">
							
							<div class="w-100 w-xl-50 pr-3 pt-2">
								
								<a href="<?php echo $value['ruta']; ?>">

									<img src="<?php echo $value['portada']; ?>" alt="<?php echo $value['titulo']; ?>" class="img-fluid">

								</a>

							</div>

							<div>

								<a href="<?php echo $value['ruta']; ?>" class="text-secondary">

									<p class="small"><?php echo $value['description']; ?></p>

								</a>

							</div>

						</div>
					<?php endforeach ?>


				</div>

				<!-- PUBLICIDAD -->

				<div class="my-4">
					
					<img src="views/img/ad01.jpg" class="img-fluid">

				</div>

				<div class="my-4">
					
					<img src="views/img/ad02.jpg" class="img-fluid">

				</div>	

				<div class="my-4">
					
					<img src="views/img/ad05.png" class="img-fluid">

				</div>	
				
			</div>

		</div>

	</div>

</div>