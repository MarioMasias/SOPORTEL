<?php require 'intranet.view.php'; ?>

	<div class="contenedor2">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>AÑADIR AL INVENTARIO</h1>
				<hr>
			</div>
		</div>
		<div class="post">
				<article>
					
					<form class="formulario" method ="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">
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
						<label for="">SBN:</label>
						<input type="text" name="sbn" placeholder="SBN">
						<label for="">Serie:</label>
						<input type="text" name="serie" placeholder="SERIE">
						<label for="">Tipo:</label>
						<input type="text" name="tipo" placeholder="TIPO">
						<!--<select name="tipo" id="tipo">
							<?php /*
									$sentencia = $conexion -> prepare ("SELECT * FROM equipo");
									$sentencia->execute();
									$rec2=$sentencia->fetchAll();
									foreach($rec2 as $row2){
										echo "<option value ='".$row2['tipo']."'";
										echo ">";
										echo $row2['tipo'];
										echo "</option>";
									}	*/			
							 ?>-->
						</select>
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
							  <option value="Salon">salones</option>
							  <option value="Area de Decanato">Area de Decanato</option>
							  <option value="Area de Vicedecanato">Area de Vicedecanato</option>
							  <option value="Area de USGOM">Area de USGOM</option>
							  <option value="Area de Soporte">Area de Soporte</option>
							  <option value="Area de Tramite Documentario">Area de Tramite Documentario</option>
							  <option value="Area de Matricula">Area de Matricula</option>
						</select>
						<label for="">Descripcion:</label>
						<input type="text" name="descripcion" placeholder="DESCRIPCION">
						<?php if (!empty($errores)): ?>
							<div class="alert error">
								<?php echo $errores; ?>
							</div>
						<?php elseif($enviado): ?>
							<div class="alert success">
								<p>Enviado Correctamente</p>
							</alert>
						<?php endif ?>
						<input type="submit" value="Crear ">
	
					</form>		
				</article>
				
		</div>
	</div>
