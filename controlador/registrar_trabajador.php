<?php session_start();

require '../admin/config.php';
require 'funciones.php';
//include ("encriptar.php");

$conexion = conexion($bd_config);
$errores='';
$enviado='';
if(!$conexion){
	header('Location: error.php');
}


$error='';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$codigo=$_POST['codigo'];
	$nombre=$_POST['nombre'];
	$DNI=$_POST['DNI'];
	$fecha=$_POST['fecha'];
	$usuario=$_POST['usuario'];
	$contraseña1=$_POST['contraseña1'];
	$contraseña2=$_POST['contraseña2'];

	/*Validacion de No Vacio y No mayor a 8 caracteres*/
		if(empty($codigo)){
			$errores .='Por favor ingrese un codigo  <br/>';
			
		}else if(strlen($codigo)>8){
			$errores .='Por favor ingrese un codigo no mayor a 50 caracteres <br/>';
			
		}else if(strlen($codigo)<8){
			$errores .='Por favor ingrese un codigo no mayor a 50 caracteres <br/>';
			
		}else{
			$codigo=limpiarDatos($_POST['codigo']);
		}

	/*Validacion de No Vacio y No mayor a 100 caracteres*/
		if(empty($valor)){
			$errores .='Por favor ingrese un valor  <br/>';
			
		}else if(strlen($valor)>100){
			$errores .='Por favor ingrese un valor no mayor a 100 caracteres <br/>';
			
		}else{
			$valor=limpiarDatos($_POST['valor']);
		}

	/*Validacion de No Vacio y No mayor a 8 caracteres*/
		if(empty($DNI)){
			$errores .='Por favor ingrese un DNI  <br/>';
			
		}else if(strlen($DNI)>8){
			$errores .='Por favor ingrese un DNI no mayor a 8 numeros <br/>';
			
		}else if(strlen($DNI)<8){
			$errores .='Por favor ingrese un DNI no menor a 8 numeros <br/>';
			
		}else{
			$DNI=limpiarDatos($_POST['DNI']);
		}
	/*Validacion de No Vacio y No mayor a 50 caracteres*/
		if(empty($usuario)){
			$errores .='Por favor ingrese un nombre  <br/>';
			
		}else if(strlen($usuario)>12){
			$errores .='Por favor ingrese un nombre no mayor a 12 caracteres <br/>';
			
		}else{
			$usuario=limpiarDatos($_POST['usuario']);
		}

	/*Validacion de No Vacio y No mayor a 8 caracteres*/
		if(empty($contraseña)){
			$errores .='Por favor ingrese un contraseña  <br/>';
			
		}else if(strlen($contraseña)>8){
			$errores .='Por favor ingrese una contraseña no mayor a 8 caracteres <br/>';
			
		}else{
			$contraseña=limpiarDatos($_POST['contraseña']);
		}	


	if(!$errores){

			$codigo=$_POST['codigo'];/**/
			$nombre=limpiarDatos($_POST['nombre']);/**/
			$DNI=limpiarDatos($_POST['DNI']);/**/
			$tipo=limpiarDatos($_POST['tipo']);
			$fechaNacimiento=$_POST['fecha'];/**/
			$usuario=limpiarDatos($_POST['usuario']);/**/
			$pass1=limpiarDatos($_POST['contraseña1']);/**/
			$pass2=limpiarDatos($_POST['contraseña2']);/**/

			if(empty($codigo) or empty($nombre) or empty($DNI) or empty($fechaNacimiento) or empty($usuario) or  empty($pass1) or  empty($pass2)){
				$error.='<li>Por favor rellene todos los campos</li>';
			}else{
				
				$statement = $conexion->prepare('SELECT * FROM trabajador WHERE codigo=:codigo LIMIT 1' );
				$statement->execute(array(':codigo'=>$codigo));
				$resultado=$statement->fetch();

				if($resultado!=false){
					$error.='<li> El codigo ya existe </li>';
				}

				/*$pass1 = hash('sha512', $pass1);
				  $pass2 = hash('sha512', $pass2);*/

				if($pass1!=$pass2){
					$error.='<li> Las contraseñas son distintas </li>';
				}

			}

			

				//$pass2=SED::encrip($pass1);

				$statement=$conexion->prepare(
				'INSERT INTO trabajador(codigo,nombre,DNI,TipoDeTrabajador,fechaNacimiento,usuario,pass)
				VALUES (:codigo,:nombre,:DNI,:tipo,:fechaNacimiento,:usuario,:pass)'
				);

				$statement->execute(array(
					':codigo'=>$codigo,
					':nombre'=>$nombre,
					':DNI'=>$DNI,
					':tipo'=>$tipo,
					':fechaNacimiento'=>$fechaNacimiento,
					':usuario'=>$usuario,
					':pass'=>$pass2,
				));

				header('Location: lista_usuarios.php');
	}

}
require '../views/registrar_trabajador.view.php';

 ?>