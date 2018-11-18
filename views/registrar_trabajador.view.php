<?php require 'intranet.view.php'; ?>
	
	<div class="contenedor2">
		<div class="row">
			<div class="col-md-12 text-center">
				<h1>REGISTRO DE USUARIO</h1>
				<hr>
			</div>
		</div>
		<div class="post">
				<article>
					<form method ="post" enctype="multipart/form-data" action="<?php echo htmlspecialchars($_SERVER['PHP_SELF']); ?>">				
						
						<label>Codigo: </label>				
						<input type="number" name="codigo" placeholder="Codigo">

						<label>Nombre Completo: </label>				
						<input type="text" name="nombre" placeholder="Nombre Completo">
							
						<label>DNI: </label>				
						<input type="text" name="DNI" placeholder="DNI">

						<label>Tipo: </label>				
						<select name="tipo" id="tipo">
							<option value="Pranticante">Practicante</option>
							<option value="Bolsista">Bolsista</option>
							<option value="Bolsista">Bolsista Desarrollo</option>
							<option value="Sysadmin">Sysadmin</option>
							<option value="Jefe de Area">Jefe de Area</option>
						</select>

						<label>Fecha Nacimiento: </label>
						<input type="date" name="fecha" placeholder="Fecha Nacimiento">

						<label>Usuario: </label>
						<input type="text" name="usuario" placeholder="Usuario">

						<label>Contraseña: </label>
						<input type="password" name="contraseña1" placeholder="Contraseña">

						<label>Repita Contraseña: </label>
						<input type="password" name="contraseña2" placeholder="Repita Contraseña">
						
						<?php if (!empty($errores)): ?>
							<div class="alert error">
								<?php echo $errores; ?>
							</div>
						<?php elseif($enviado): ?>
							<div class="alert success">
								<p>Enviado Correctamente</p>
							</alert>
						<?php endif ?>
						<input type="submit" value="Registar Usuario">

						

					</form>		
				</article>			
		</div>
	</div>
