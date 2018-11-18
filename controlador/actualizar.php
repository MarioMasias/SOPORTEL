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
		 "UPDATE solicitud_servicio SET estado='Realizado' WHERE id='".$id."'"
		 );
	$statement->execute();

	header('Location: lista_objetos_perdidos.php');
}
 ?>

 </body>
 </html>