<!--=====================================
GRID DE CATEGORÍAS
======================================-->

<div class="container-fluid py-2 py-md-5 bg-white grid">

	<div class="container p-0">

		<div class="d-flex">

			<div class="d-flex flex-column columna1">
			
				<figure class="p-2 photo1" vinculo="<?php echo $menu[0]['ruta']; ?>" style="background-image: url(<?php echo $menu[0]['img']; ?>);">
					
					<p class="text-uppercase p-1 p-md-3 p-xl-4"><?php echo $menu[0]['titulo']; ?></p>

				</figure>

				<figure class="p-2 photo2" vinculo="<?php echo $menu[1]['ruta']; ?>" style="background-image: url(<?php echo $menu[1]['img']; ?>);">
					
					<p class="text-uppercase p-1 p-md-3 p-xl-4"><?php echo $menu[1]['titulo']; ?></p>

				</figure>

				<figure class="d-block d-md-none p-2 photo6" vinculo="<?php echo $menu[2]['ruta']; ?>" style="background-image: url(<?php echo $menu[2]['img']; ?>);">
					
					<p class="text-uppercase p-1 p-md-3 p-xl-4"><?php echo $menu[2]['titulo']; ?></p>

				</figure>

			</div>

			<div class="d-flex flex-column flex-fill columna2">

				<div class="d-block d-md-flex">

					<figure class="p-2 flex-fill photo3" vinculo="<?php echo $menu[3]['ruta']; ?>" style="background-image: url(<?php echo $menu[3]['img']; ?>);">

						<p class="text-uppercase p-1 p-md-3 p-xl-4"><?php echo $menu[3]['titulo']; ?></p>
						
					</figure>

					<figure class="p-2 flex-fill photo4" vinculo="<?php echo $menu[4]['ruta']; ?>" style="background-image: url(<?php echo $menu[4]['img']; ?>);">
						
						<p class="text-uppercase p-1 p-md-3 p-xl-4"><?php echo $menu[4]['titulo']; ?></p>

					</figure>

				</div>

				<figure class="p-2 photo5" vinculo="<?php echo $menu[5]['ruta']; ?>" style="background-image: url(<?php echo $menu[5]['img']; ?>);">

					<p class="text-uppercase p-1 p-md-3 p-xl-4"><?php echo $menu[5]['titulo']; ?></p>
					
				</figure>

			</div>

		</div>

	</div>

</div>