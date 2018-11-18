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
	$nombre=$_POST['nombre'];

	if(empty($nombre)){
			$errores .='Por favor ingrese un nombre  <br/>';
			
		}else if(strlen($nombre)>50){
			$errores .='Por favor ingrese un nombre no mayor a 50 caracteres <br/>';
			
		}else{
			$nombre=limpiarDatos($_POST['nombre']);
		}

	if(!$errores){
		$id=$_POST['id_objeto'];
		$entregador=limpiarDatos($_POST['entregador']);
		$nombre=limpiarDatos($_POST['nombre']);/**/


		$statement2=$conexion->prepare(
			 "UPDATE objetos_perdidos SET estado='Encontrado',entregado_por= :entregador,entregado_a_nombre=:nombre WHERE id='".$id."'"
			 );
		$statement2->execute(array(
			':entregador'=>$entregador,
			':nombre'=>$nombre));

		$statement3=$conexion->prepare(
			 "UPDATE objetos_perdidos SET fecha= CURRENT_TIMESTAMP WHERE id='".$id."'"
			 );
		$statement3->execute();
		
		header('Location: lista_objetos_encontrados.php');
	}
}

require '../views/registrar_objeto_encontrado.view.php';

 ?>