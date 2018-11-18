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

   

	
    require '../views/intranet.view.php';
	require '../views/asistencia.view.php';
}else {
	header('Location: login.php');
}
 ?>

 </body>
 </html>