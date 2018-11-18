
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
	$sbn=$_POST['sbn'];
	$serie=$_POST['serie'];
	$tipo=$_POST['tipo'];
	$descripcion=$_POST['descripcion'];
	if(empty($sbn)){
			$errores .='Por favor ingrese un SBN  <br/>';
			
		}else if(strlen($sbn)>30){
			$errores .='Por favor ingrese un SBN no mayor a 30 caracteres <br/>';
		}else{
			$sbn=limpiarDatos($_POST['sbn']);
		}

	if(empty($serie)){
			$errores .='Por favor ingrese la serie del equipo  <br/>';
			
		}else if(strlen($serie)>10){
			$errores .='Por favor ingrese la serie no mayor a 10 caracteres <br/>';
			
		}else{
			$serie=limpiarDatos($_POST['serie']);
		}
	if(empty($tipo)){
			$errores .='Por favor ingrese el tipo de inventario  <br/>';
			
		}else if(strlen($tipo)>30){
			$errores .='Por favor ingrese el tipo de inventario no mayor a 30 caracteres <br/>';
			
		}else{
			$tipo=limpiarDatos($_POST['tipo']);
		}
	if(empty($descripcion)){
			$errores .='Por favor ingrese una descripcion  <br/>';
			
		}else if(strlen($descripcion)>100){
			$errores .='Por favor ingrese la descripcion no mayor a 100 caracteres <br/>';
			
		}else{
			$descripcion=limpiarDatos($_POST['descripcion']);
		}

	if(!$errores){
		$sbn=limpiarDatos($_POST['sbn']);/**/
		$serie=limpiarDatos($_POST['serie']);/**/
		$tipo=limpiarDatos($_POST['tipo']);/**/
		$descripcion=limpiarDatos($_POST['descripcion']);/**/
		$lugar=limpiarDatos($_POST['lugar']);
		$trabajador=limpiarDatos($_POST['trabajador']);

		$statement1=$conexion->prepare(
			'INSERT INTO equipo(ID_EQUIPO,sbn,serie,tipo,descripcion)
			VALUES (null,:sbn,:serie,:tipo,:descripcion)'
			);

		$statement1->execute(array(
			':sbn'=>$sbn,
			':serie'=>$serie,
			':tipo'=>$tipo,
			':descripcion'=>$descripcion,
			));
		
		$sentencia=$conexion->prepare ("SELECT * FROM equipo where SBN='$sbn'");
									$sentencia->execute();
									$rec=$sentencia->fetchAll();
									$EQUIPO_ID_EQUIPO=1;
									 foreach($rec as $post): 

												echo "codigo adentro"; 
											  $EQUIPO_ID_EQUIPO=$post['ID_EQUIPO'];											
											  echo $post['ID_EQUIPO'];
										
									 endforeach;

		$statement2=$conexion->prepare(
			'INSERT INTO inventario(EQUIPO_ID_EQUIPO,Trabajador_codigo,LUGAR)
			VALUES (:EQUIPO_ID_EQUIPO,:Trabajador_codigo,:LUGAR)'
			);


		



		$statement2->execute(array(
			':EQUIPO_ID_EQUIPO'=>$EQUIPO_ID_EQUIPO,
			':Trabajador_codigo'=>$trabajador,
			':LUGAR'=>$lugar,
			));
	}
}

require '../views/nuevo_servidor.view.php';

 ?>