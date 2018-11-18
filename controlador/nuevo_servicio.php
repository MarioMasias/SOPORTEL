<?php session_start();

require '../admin/config.php';
require 'funciones.php';

$conexion = conexion($bd_config);
$errores='';
$enviado='';
if(!$conexion){
	header('Location: error.php');
}

if($_SERVER['REQUEST_METHOD']=='POST'){
		$usuario=$_POST['usuario'];
		$detalle=$_POST['detalle'];

		/*Validacion de No Vacio y No mayor a 50 caracteres*/
		if(empty($usuario)){
			$errores .='Por favor ingrese un nombre  <br/>';
			
		}else if(strlen($usuario)>50){
			$errores .='Por favor ingrese un nombre no mayor a 50 caracteres <br/>';
			
		}else{
			$usuario=limpiarDatos($_POST['usuario']);
		}

		/*Validacion de No Vacio y No mayor a 50 caracteres*/
		if(empty($detalle)){
			$errores .='Por favor ingrese el detalle <br/>';
			
		}else if(strlen($detalle)>50){
			$errores .='Por favor ingrese el detalle no mayor a 50 caracteres <br/>';
			
		}else{
			$detalle=limpiarDatos($_POST['detalle']);
		}

		/*Limpieza de datos y envio a la BD*/
		if(!$errores){
			$trabajador=limpiarDatos($_POST['trabajador']);
			$servicio=limpiarDatos($_POST['servicio']);
			$lugar=limpiarDatos($_POST['lugar']);
			$Tipo=limpiarDatos($_POST['Tipo']);



			$statement=$conexion->prepare(
				'INSERT INTO solicitud_servicio(id,trabajador,usuario,servicio,lugar,detalle)
				VALUES (null,:trabajador,:usuario,:servicio,:lugar,:detalle)'
				);

			$statement2=$conexion->prepare(
				'INSERT INTO usuario(IdUsuario,Nombre,Tipo)
				VALUES (null,:usuario,:tipo)'
				);

			$statement->execute(array(
				':trabajador'=>$trabajador,
				':usuario'=>$usuario,
				':servicio'=>$servicio,
				':lugar'=>$lugar,
				':detalle'=>$detalle,
				));

			$statement2->execute(array(
				':usuario'=>$usuario,
				':Tipo'=>$Tipo,
				));

			header('Location: orden_servicio.php');


		}

	}
	



require '../views/nuevo_servicio.view.php';

 ?>