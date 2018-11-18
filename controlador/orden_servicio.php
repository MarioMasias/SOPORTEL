<?php 
session_start();

if(isset($_SESSION['usuario'])){
	require '../admin/config.php';

	require 'funciones.php';

	$conexion = conexion($bd_config);

	if(!$conexion){
		echo 'ERROR CONEXION';
	}

	$solicitudes= datos_solicitud($conexion,'Pendiente');


	if(!$solicitudes){
		echo 'ERROR POST';
	}
	require '../views/orden_servicio.view.php';
	
	}
	else {
		header('Location: login.php');
	}
 ?>


 </body>
 </html>