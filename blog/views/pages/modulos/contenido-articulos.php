<!--=====================================
CONTENIDO ARTÍCULO
======================================-->
<?php 
	//echo '<pre class="bg-light">'; print_r($articulo['palabras_clave']); echo '</pre>';
 ?>
<div class="container-fluid bg-white contenidoInicio py-2 py-md-4">
	
	<div class="container">

		<!-- BREADCRUMB -->

		<a href="<?php echo $categoria; ?>">
			
			<button class="d-block d-sm-none btn btn-info btn-sm mb-2">
			
				REGRESAR 

			</button>

		</a>

		<ul class="breadcrumb bg-white p-0 mb-2 mb-md-4 breadArticulo">

			<li class="breadcrumb-item inicio"><a href="<?php echo $global_apiserver; ?>">Inicio</a></li>

			<li class="breadcrumb-item"><a href="<?php echo $ruta_categoria; ?>"><?php echo $categoria; ?></a></li>

			<li class="breadcrumb-item active"><?php echo $titulo; ?></li>

		</ul>
		
		<div class="row">
			
			<!-- COLUMNA IZQUIERDA -->

			<div class="col-12 col-md-8 col-lg-9 p-0 pr-lg-5">
				
				<!-- ARTÍCULO 01 -->

				<div class="container">

					<div class="d-flex">
					
						<div class="fechaArticulo"><?php echo $fechaArticulo; ?></div>

						<h3 class="tituloArticulo text-right text-muted pl-3 pt-lg-2"><?php echo $titulo; ?></h3>

					</div>

					<img src="<?php echo $portada; ?>" alt="Lorem ipsum dolor sit amet" class="img-fluid my-lg-3">

					<?php echo $contenido; ?>

					<!-- PUBLICIDAD -->

					<img src="views/img/ad04.png" class="img-fluid my-3" width="100%">


					<!-- COMPARTIR EN REDES -->

					<div class="float-right my-3 btnCompartir">
						
						<div class="btn-group text-secondary">

							Si te gustó compártelo:

						</div>
						
						<div class="btn-group">
							
							<button type="button" class="btn border-0 text-white social-share" data-share="facebook" style="background: #1475E0">
								
								<span class="fab fa-facebook pr-1"></span>

								Facebook

							</button>

						</div>

						<div class="btn-group">
							
							<button type="button" class="btn border-0 text-white social-share" data-share="twitter" style="background: #00A6FF">
								
								<span class="fab fa-twitter pr-1"></span>

								Twitter

							</button>

						</div>

					</div>
					<!--    METODO CON FACEBOOK DEV
					<div class="fb-share-button" data-href="http://localhost/CMS/CMS_APP/blog/titulo-de-articulo-1" data-layout="button" data-size="large"><a target="_blank" href="https://www.facebook.com/sharer/sharer.php?u=http%3A%2F%2Flocalhost%2FCMS%2FCMS_APP%2Fblog%2Ftitulo-de-articulo-1&amp;src=sdkpreparse" class="fb-xfbml-parse-ignore">Compartir</a></div>
					-->
					<!-- AVANZAR - RETROCEDER -->

					<div class="clearfix"></div>

					<!-- ETIQUETAS -->

					<div>

						<h4>Etiquetas</h4>
							<?php foreach ($etiquetas as $key => $value): ?>
								<a href="#suramerica" class="btn btn-secondary btn-sm m-1"><?php echo $value; ?></a> 
							<?php endforeach ?>													
					</div>

				 	<div class="d-md-flex justify-content-between my-3 d-none">
					    
					    <a href="articulos.html">Leer artículo anterior</a>
					    
					    <a href="articulos.html">Leer artículo siguiente</a>

				  	</div>

				  	<!-- DESLIZADOR DE ARTÍCULOS -->

				  	<section class="jd-slider deslizadorArticulos my-4">
				  		
						<div class="slide-inner">
							
							<ul class="slide-area">
								<?php foreach ($articulos_destacados as $key => $value): ?>
									<li class="px-3">

										<a href="<?php echo $value['ruta']; ?>" class="text-secondary">

											<img src="<?php echo $value['portada']; ?>" alt="<?php echo $value['titulo']; ?>" class="img-fluid">

											<h6 class="py-2"><?php echo $value['titulo']; ?></h6>

										</a>

										<p class="small"><?php echo $value['description']; ?></p>

								1	</li>
								<?php endforeach ?>

							</ul>

							<a class="prev" href="#">

				                <i class="fas fa-angle-left text-muted"></i>

				            </a>

				            <a class="next" href="#">

				                <i class="fas fa-angle-right text-muted"></i>

				            </a>

						</div>

						 <div class="controller">

				            <div class="indicate-area"></div>

				        </div>

				  	</section>

				  	<!-- BLOQUE DE OPINIONES -->

				  	<h3 style="color:#8e4876">Opiniones</h3>

				  	<hr style="border: 1px solid #79FF39">
					
					<div class="row opiniones">
						
						<div class="col-3 col-sm-4 col-lg-2 p-2">
						
							<img src="views/img/user01.jpg" class="img-thumbnail">	

						</div>

						<div class="col-9 col-sm-8 col-lg-10 p-2 text-muted">
							
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae, aut sint provident dolorem minus recusandae facere, ipsum magnam, nostrum enim. Error quasi quod ab consectetur explicabo consequuntur obcaecati suscipit!</p>

							<span class="small float-right">Carla Gómez | 20.09.2018</span>

						</div>	

						<div class="col-9 col-sm-8 col-lg-10 p-2 text-muted">
							
							<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit. Architecto beatae, aut sint provident dolorem minus recusandae facere, ipsum magnam, nostrum enim. Error quasi quod ab consectetur explicabo consequuntur obcaecati suscipit!</p>

							<span class="small float-right">Juanito Travel | 20.09.2018</span>

						</div>

						<div class="col-3 col-sm-4 col-lg-2 p-2">
						
							<img src="views/img/user02.jpg" class="img-thumbnail">	

						</div>

					</div>

					<hr style="border: 1px solid #79FF39">

					<!-- FORMULARIO DE OPINIONES -->
					
					<form>
						
						<label class="text-muted lead">¿Qué tal te pareció el artículo?</label>

						<div class="row">
							
							<div class="col-12 col-md-8 col-lg-9">
								
								<div class="input-group-lg">
									
									<input type="text" class="form-control my-3" placeholder="Tu nombre">

									<input type="email" class="form-control my-3" placeholder="Tu email">

								</div>

							</div>

							<div class="d-none d-md-block col-md-4 col-lg-3">
								
								<img src="views/img/subirFoto.png" class="img-fluid mt-md-3 mt-xl-2">

							</div>

						</div>	

						<textarea class="form-control my-3" rows="7" placeholder="Escribe aquí tu mensaje"></textarea>
						
						<input type="submit" class="btn btn-dark btn-lg btn-block" value="Enviar">

					</form>

					<!-- PUBLICIDAD -->

					<img src="views/img/ad01.jpg" class="img-fluid my-3 d-block d-md-none" width="100%">


				</div>

			</div>

			<!-- COLUMNA DERECHA -->

			<div class="d-none d-md-block pt-md-4 pt-lg-0 col-md-4 col-lg-3">		

				<!-- ARTÍCULOS RECIENTES -->

				<div class="my-4">
					
					<h4>Artículos Recientes</h4>
					<!--
					<div class="d-flex my-3">
						
						<div class="w-100 w-xl-50 pr-3 pt-2">
							
							<a href="articulos.html">

								<img src="views/img/articulo05.png" alt="Lorem ipsum dolor sit amet" class="img-fluid">

							</a>

						</div>

						<div>

							<a href="articulos.html" class="text-secondary">

								<p class="small">Lorem ipsum dolor sit amet, consectetur adipisicing elit.</p>

							</a>

						</div>

					</div>
				-->

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

				<div class="mb-4">
					
					<img src="views/img/ad03.png" class="img-fluid">

				</div>

				<div class="my-4">
					
					<img src="views/img/ad02.jpg" class="img-fluid">

				</div>	

				<div class="my-4">
					
					<img src="views/img/ad06.png" class="img-fluid">

				</div>	
				
			</div>

		</div>

	</div>

</div>
