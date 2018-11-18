<?php require 'intranet.view.php'; ?>
	
	<div class="contenedor2">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>REGISTRO DE SERVICIO</h1>
				<hr>
			</div>
		</div>
		<div class="post">
				<article>
					<form method ="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">				
						
						<label>Bolsista: </label>
						<select name="trabajador" id="trabajador">
							<?php 
								$sentencia = $conexion -> prepare ("SELECT * FROM trabajador");
								$sentencia->execute();
								$rec=$sentencia->fetchAll();
								foreach($rec as $row){
									echo "<option value ='".$row['codigo']."'";
									echo ">";
									echo $row['nombre'];
									echo "</option>";
								}				
							 ?>
						</select>
							
						<label>Cliente: </label>				
						<input type="text" name="usuario" placeholder="Usuario">
				
						<label>Tipo Cliente: </label>
								<select nombre="Tipo">
									<option value="Administrativo">Administrativo</option>
									<option value="Alumno">Alumno</option>
									<option value="Docente">Docente</option>				
								</select>

						<label for="">Servicio a realizar: </label>
						<select name="servicio" id="servicio">
							<?php 
								$sentencia = $conexion -> prepare ("SELECT * FROM servicio");
								$sentencia->execute();
								$rec=$sentencia->fetchAll();
								foreach($rec as $row){
									echo "<option value ='".$row['nombre']."'";
									echo ">";
									echo $row['nombre'];
									echo "</option>";
								}				
							 ?>
						</select>

						<label for="">Detalle del servicio: </label>
						<input type="text" name="detalle" placeholder="Detalle">

						<label for="">Lugar: </label>

						<select name="lugar" id="lugar">
							  <option value="laboratorio 1">laboratorio 1</option>
							  <option value="laboratorio 2">laboratorio 2</option>
							  <option value="laboratorio 3">laboratorio 3</option>
							  <option value="laboratorio 4">laboratorio 4</option>
							  <option value="laboratorio 5">laboratorio 5</option>
							  <option value="laboratorio 6">laboratorio 6</option>
							  <option value="laboratorio 7">laboratorio 7</option>
							  <option value="laboratorio 8">laboratorio 8</option>
							  <option value="laboratorio 9">laboratorio 9</option>
							  <option value="salones">salones</option>
							  <option value="Area de Decanato">Area de Decanato</option>
							  <option value="Area de Vicedecanato">Area de Vicedecanato</option>
							  <option value="Area de USGOM">Area de USGOM</option>
							  <option value="Area de Soporte">Area de Soporte</option>
							  <option value="Area de Tramite Documentario">Area de Tramite Documentario</option>
							  <option value="Area de Matricula">Area de Matricula</option>
						</select>

						<?php if (!empty($errores)): ?>
							<div class="alert error">
								<?php echo $errores; ?>
							</div>
						<?php elseif($enviado): ?>
							<div class="alert success">
								<p>Enviado Correctamente</p>
							</alert>
						<?php endif ?>
						<input type="submit" value="Crear Servicio">
					</form>		
				</article>
				
		</div>
		
	</div>
