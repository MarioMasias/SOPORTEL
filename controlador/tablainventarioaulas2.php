<?php 
session_start();

if(isset($_SESSION['usuario'])){
	require '../admin/config.php';

	require 'funciones.php';

	$conexion = conexion($bd_config);

	if(!$conexion){
		echo 'ERROR CONEXION';
		//header('Location: error.php');
	}
	
	$solicitudes=  obtener_datos_inventario($conexion,'salones');


	if(!$solicitudes){
		echo 'ERROR POST';
		//header('Location: error.php');
	}
	  require '../views/tablainventarioaulas.view.php';
	  
	}
	else {
		header('Location: login.php');
	}
 ?>


 </body>
 </html>