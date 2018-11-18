<?php 
session_start();

if(isset($_SESSION['usuario'])){
	require '../admin/config.php';

	require 'funciones.php';

	$conexion = conexion($bd_config);

	if(!$conexion){
		//header('Location: error.php');
	}

	$solicitudes= datos_objetos($conexion,'Encontrado');


	if(!$solicitudes){
		echo 'ERROR POST';
		//header('Location: error.php');
	}
	  require '../views/lista_objetos_encontrados.view.php';
	  
	}
	else {
		header('Location: login.php');
	}
 ?>


 </body>
 </html>