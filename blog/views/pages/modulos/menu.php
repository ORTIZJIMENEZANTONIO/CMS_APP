<!--=====================================
MENU
======================================-->

<div class="container-fluid menu">

	<a href="#" class="btnClose">X</a>

	<ul class="nav flex-column text-center">
		<?php foreach ($menu as $key => $value): ?>
			<li class="nav-item">
				<a class="nav-link text-white" href="<?php echo $value['ruta']; ?>"><?php echo $value['titulo']; ?></a>

			</li>
		<?php endforeach ?>

	</ul>

</div>