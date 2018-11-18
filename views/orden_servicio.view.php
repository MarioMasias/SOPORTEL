<?php require 'intranet.view.php'; ?>
	<div class="container contenido">	
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>SERVICIOS PENDIENTES</h1>
				<hr>
			</div>
		</div>	
		<div class="row">
			<div class="col-md-12">		
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th>Trabajador</th>
							<th>Cliente </th>
							<th>Servicio</th>
							<th>Lugar</th>
							<th>Detalle</th>
							<th>Fecha </th>
							<th>Agregar</th>
							<th>Eliminar</th>			
						</tr>
					</thead>
					<tbody>
						<?php foreach($solicitudes as $post): ?>

						<tr>
							<td><?php  echo $post['trabajador']?></td>
							<td><?php  echo $post['usuario']?></td>
							<td><?php  echo $post['servicio']?></td>
							<td><?php  echo $post['lugar']?></td>
							<td><?php  echo $post['detalle']?></td>
							<td><?php  echo fecha($post['fecha'])?></td>
							<td><a href="actualizar.php?id=<?php echo $post['id'];?>"><button type="button" class="btn btn-succes">Realizado</button></a></td>
							<td><a href="eliminar.php?id=<?php echo $post['id'];?>"><button type="button" class="btn btn-succes">Eliminar</button></a></td>
						</tr>	
						<?php endforeach;?>
					</tbody>
				</table>
			</div>
		</div>
	</div>
	<script src="../js/jquery.min.js"></script>
	<script src="../js/bootstrap.min.js"></script>
	<script src="../js/jquery.dataTables.min.js"></script>
	<script src="../js/script.js"></script>
	<script src="../js/dataTables.bootstrap.min.js"></script>
</body>
</html>
