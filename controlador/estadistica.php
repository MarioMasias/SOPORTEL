<?php 
session_start();

if(isset($_SESSION['usuario'])){
	$bd_config = array(
	'basedatos'=>'soportel',
	'usuario'=>'root',
	'pass'=>''
	);


$blog_config=array(
	'post_por_pagina'=>'4'
	);

	require 'funciones.php';

    

	$conexion = conexion($bd_config);

	if(!$conexion){
		echo 'ERROR CONEXION';
		//header('Location: error.php');
	}

   

	
    require '../views/intranet.view.php';
	require '../views/estadistica.view1.php';
}else {
	header('Location: login.php');
}
 ?>

 </body>
 </html>