<!--<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
	<title>DataTables jQuery</title>
	<link rel="stylesheet" href="css/bootstrap.min.css">
	<link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/dataTables.bootstrap.min.css">
</head>
<body>-->
	<?php require 'intranet.view.php'; ?>
	<div class="container contenido">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>SERVICIOS REALIZADOS</h1>
				<hr>
			</div>
		</div>
		<a href="../controlador/reporteserviciorealizado.php"><button type="button" class="btn btn-succes">Generar reporte PDF</button></a>
      <?php /*   Aqui manda a generar el reporte de PDF      */ ?> 
		<div class="row">
			<div class="col-md-12">
				<table id="example" class="table table-striped table-bordered" cellspacing="0" width="100%">
			        <thead>
			            <tr>
			                <th>Trabajador</th>
							<th>Usuario</th>
							<th>Servicio</th>
							<th>Lugar</th>
							<th>Detalle</th>
							<th>Fecha - Hora</th>
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
							<td><?php  echo $post['fecha']?></td>
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