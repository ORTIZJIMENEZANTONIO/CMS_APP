<header class="container-fluid">
	
	<div class="container p-0">
		
		<div class="row">
			
			<!-- LOGO -->
			<div class="col-10 col-sm-11 col-md-8 pt-1 pt-lg-3 p-xl-0">
				
				<a href="./">
					
					<img src="views/img/logotipo-negativo.png" alt="Logo de Juanito Travel" class="img-fluid logotipo">

				</a>

			</div>

			<!-- REDES SOCIALES -->
			<div class="d-none d-md-block col-md-2 redes">
				
				<ul class="d-flex justify-content-end pt-3 mt-1">
					<?php 
						$redes = json_decode($blog['redes_sociales'],true);
					 ?>
					
					<?php foreach ($redes as $key => $value): ?>
						<li>
							<a href="<?php echo $value['url'];?>" target="_blank">
								<i class="<?php echo $value['icono'];?> lead rounded-circle text-white mr-1"></i>
							</a>
						</li>
					<?php endforeach ?>
				</ul>

			</div>

			<!-- BUSCADOR Y BOTÓN MENÚ -->
			<div class="col-2 col-sm-1 col-md-2 d-flex justify-content-end pt-3 mt-1">
				
				<!-- BUSCADOR -->
				<div class="d-none d-md-block pr-4 pr-lg-5 mt-1">
					<i class="fas fa-search lead" data-toggle="collapse" data-target="#buscador"></i>
				</div>	

				<!-- BOTÓN MENÚ -->
				<div class="m-0 mt-sm-1 mt-md-0 pr-0 pr-sm-2 pr-lg-3">
					<i class="fas fa-bars lead"></i>
				</div>
				
			</div>

			<!-- ENTRADA DEL BUSCADOR -->

			<div id="buscador" class="collapse col-12">
				
				<div class="input-group float-right w-50 pl-xl-5 pb-3">
					
					<input type="text" class="form-control text-lowercase busqueda" placeholder="Buscar">

					<div class="input-group-append">
						
						<span class="input-group-text bg-primary border-0" style="cursor:pointer">
							
							<i class="fas fa-search" id="buscar"></i>

						</span>

					</div>

				</div>

			</div>

		</div>

	</div>

</header>