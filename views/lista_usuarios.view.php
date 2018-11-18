
	<?php require 'intranet.view.php'; ?>
	<div class="container contenido">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>USUARIOS REGISTRADOS</h1>
				<hr>
			</div>
		</div>
		<div class="row">
			<div class="col-md-12">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>Codigo</th>
							<th>Nombre</th>
							<th>DNI</th>
							<th>Fecha de Nacimiento</th>
							<th>Tipo de Empledo</th>
			            </tr>
			        </thead>
			        <tbody>
			           <?php foreach($solicitudes as $post): ?>
						<tr>
							<td><?php  echo $post['codigo']?></td>
							<td><?php  echo $post['nombre']?></td>
							<td><?php  echo $post['DNI']?></td>
							<td><?php  echo fecha($post['fechaNacimiento'])?></td>
							<td><?php  echo $post['TipoDeTrabajador']?></td>
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