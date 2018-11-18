<?php 
session_start();

	require '../admin/config.php';

	require 'funciones.php';

	$conexion = conexion($bd_config);
	if(!$conexion){
		echo 'ERROR CONEXION';
		
	}

	if($_SERVER['REQUEST_METHOD']=='GET'){
	$id=$_GET['id'];


	$statement=$conexion->prepare(
		"DELETE FROM solicitud_servicio WHERE id='".$id."'"
		);

	$statement->execute();

	header('Location: orden_servicio.php');
}
 ?>

 </body>
 </html>