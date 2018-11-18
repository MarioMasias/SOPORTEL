<?php session_start();

if(isset($_SESSION['codigo'])){
	header('Location: ../index.php');
}

//include ("encriptar.php");

$errores='';

if($_SERVER['REQUEST_METHOD']=='POST'){
	$usuario =filter_var(strtolower($_POST['usuario']),FILTER_SANITIZE_STRING);
	$password= $_POST['password'];
	//$pass2=SED::encrip($password);
     
	try{

		$conexion= new PDO('mysql:host=localhost;dbname=soportel','root','');


	}catch(PDOException $e){
		echo "Erros:".$e->getMessage();	
	}

	$statement=$conexion->prepare(
		'SELECT * FROM trabajador WHERE usuario = :usuario AND pass= :password');
	$statement->execute(array(
		':usuario'=>$usuario,
		':password'=>$password
		));

	$resultado= $statement->fetch();
    
	if($resultado!=false){
		$_SESSION['usuario']=$usuario;
		$_SESSION['codigo']=$resultado['codigo'];
		if($resultado['TipoDeTrabajador']=='Jefe de Area'){
			$_SESSION['TipoDeTrabajador']=$password;
		}
			
		header('Location: ../index.php');
	}else{
		$errores .='<li>Datos incorrectos</li>';
	}
}

require '../views/login.view.php';

 ?>