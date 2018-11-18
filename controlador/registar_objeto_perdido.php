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
	$objeto=$_POST['objeto'];
	$descripcion=$_POST['descripcion'];

	/*Validacion de No Vacio y No mayor a 50 caracteres*/
		if(empty($usuario)){
			$errores .='Por favor ingrese el nombre del usuario  <br/>';
			
		}else if(strlen($usuario)>50){
			$errores .='Por favor ingrese el nombre del usuario no mayor a 50 caracteres <br/>';
			
		}else{
			$usuario=limpiarDatos($_POST['usuario']);
		}

	/*Validacion de No Vacio y No mayor a 50 caracteres*/
		if(empty($objeto)){
			$errores .='Por favor ingrese el nombre del objeto  <br/>';
			
		}else if(strlen($objeto)>50){
			$errores .='Por favor ingrese el nombre del objeto no mayor a 50 caracteres <br/>';
			
		}else{
			$objeto=limpiarDatos($_POST['objeto']);
		}

	/*Validacion de No Vacio y No mayor a 50 caracteres*/
		if(empty($descripcion)){
			$errores .='Por favor ingrese una descripcion  <br/>';
			
		}else if(strlen($descripcion)>50){
			$errores .='Por favor ingrese una descripcion no mayor a 50 caracteres <br/>';
			
		}else{
			$descripcion=limpiarDatos($_POST['descripcion']);
		}

	if(!$errores){
	
		$trabajador=limpiarDatos($_POST['trabajador']);
		$usuario=limpiarDatos($_POST['usuario']);/**/
		$objeto=limpiarDatos($_POST['objeto']);/**/
		$descripcion=limpiarDatos($_POST['descripcion']);/**/
		$lugar=limpiarDatos($_POST['lugar']);

		$statement=$conexion->prepare(
			'INSERT INTO objetos_perdidos(id,trabajador,usuario,objeto,descripcion,lugar)
			VALUES (null,:trabajador,:usuario,:objeto,:descripcion,:lugar)'
			);

		$statement->execute(array(
			':trabajador'=>$trabajador,
			':usuario'=>$usuario,
			':objeto'=>$objeto,
			':descripcion'=>$descripcion,
			':lugar'=>$lugar,
			));

		header('Location: lista_objetos_perdidos.php');
	}
}

require '../views/registar_objeto_perdido.view.php';

 ?>