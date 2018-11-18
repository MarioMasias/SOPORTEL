<?php require 'intranet.view.php'; ?>
<div class="contenedor3">
		<h2>Lista de Inventarios de Servidores</h2>	
		<table border="1">
			<thead>
				<tr>
					<th>Tipo</th>
					<th>Nombre</th>
				</tr>
			</thead>
					
			<?php foreach($solicitudes as $post): ?>

				<tr>
					<td><?php  echo $post['tipo']?></td>
					<td><?php  echo $post['nombre']?></td>
				</tr>	
			<?php endforeach;?>
			
		</table>

		<?php require 'footer.php';?>
	</div>
