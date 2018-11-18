<?php require 'intranet.view.php'; ?>
<div class="contenedor3">
		<h2>Panel de Control</h2>
		<a href="nuevo.php" class="btn">Agregar Servicio</a>
		<?php foreach($posts as $post): ?>
			<div class="post">
				<article>
					<p class="titulo"><?php  echo $post['titulo']; ?></h2>
					<p class="fecha"><?php  echo fecha($post['fecha']); ?></p>
					<p class="extracto"><?php echo $post['extracto'];?></p>
					<a href="editar.php?id=<?php echo $post['id']; ?>">Editar</a>
					<a href="borrar.php?id=<?php echo $post['id']; ?>">Borrar</a>
				</article>
			
			</div>
		<?php endforeach;?>
		<!--<?php //require 'paginacion.php'; ?>-->
	</div>