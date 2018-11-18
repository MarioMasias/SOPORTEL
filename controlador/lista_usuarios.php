<?php 
session_start();

if(isset($_SESSION['usuario'])){
	require '../admin/config.php';

	require 'funciones.php';

	$conexion = conexion($bd_config);

	if(!$conexion){
		echo 'ERROR CONEXION';
	}

	$solicitudes=datos_usuarios($conexion);


	if(!$solicitudes){
		echo 'ERROR POST';
	}
	  require '../views/lista_usuarios.view.php';
	  
	}
	else {
		header('Location: login.php');
	}
 ?>


 </body>
 </html>