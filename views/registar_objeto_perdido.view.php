<?php require 'intranet.view.php'; ?>
	
	<div class="contenedor2">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>REGISTRO DE OBJETOS PERDIDOS</h1>
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
							
						<label>Encontrado por: </label>				
						<input type="text" name="usuario" placeholder="Usuario">

						<label>Objeto perdido: </label>
						<input type="text" name="objeto" placeholder="Objeto">

						<label>Detalle del objeto: </label>
						<input type="text" name="descripcion" placeholder="Descripción">

						<label>Lugar : </label>	
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
							  <option value="Salon 101">Salon 101</option>
							  <option value="Salon 102">Salon 102</option>
							  <option value="Salon 103">Salon 103</option>
							  <option value="Salon 104">Salon 104</option>
							  <option value="Salon 105">Salon 105</option>
							  <option value="Salon 106">Salon 106</option>
							  <option value="Salon 107">Salon 107</option>
							  <option value="Salon 108">Salon 108</option>
							  <option value="Salon 109">Salon 109</option>
							  <option value="Salon 201">Salon 201</option>
							  <option value="Salon 202">Salon 202</option>
							  <option value="Salon 203">Salon 203</option>
							  <option value="Salon 204">Salon 204</option>
							  <option value="Salon 205">Salon 205</option>
							  <option value="Salon 206">Salon 206</option>
							  <option value="Salon 207">Salon 207</option>
							  <option value="Salon 208">Salon 208</option>
							  <option value="Salon 209">Salon 209</option>
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
						<input type="submit" value="Registar Objeto Perdido">
					</form>		
				</article>			
		</div>
	</div>
