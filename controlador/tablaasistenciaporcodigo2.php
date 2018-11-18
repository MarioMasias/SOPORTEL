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

	

	if ($_SERVER['REQUEST_METHOD'] == 'GET' && !empty($_GET['busqueda'])) 
	{
		$busqueda = limpiarDatos($_GET['busqueda']);

		$statement = $conexion->prepare(
			'SELECT DISTINCT tu.horai "horai" , tu.horaf "horaf",tu.dia "dia" ,
 t.nombre "nombre", a.fecha "fecha", a.hora "hora" , a.asistencia "asistencia" 
 from asistencia a , trabajador t , turno tu 
 where a.idtrabajador=:busqueda and a.idtrabajador = t.codigo and tu.idturno = a.idturno  '); 

		


		/*$statement = $conexion->prepare('SELECT DISTINCT tu.horai "horai" , tu.horaf 
  "horaf",tu.dia "dia" , t.nombre "nombre", a.fecha "fecha",
   a.hora "hora" , a.asistencia "asistencia" 
   from asistencia a , trabajador t , turno tu
    where a.idtrabajador = t.codigo and tu.idturno = a.idturno and a.fecha = :fecha');
   /*$statement->execute(array(':busqueda' => "$busqueda")); */
    



		$statement->execute(array(':busqueda' => "$busqueda"));
		$resultados = $statement->fetchAll();

		if (empty($resultados)) 
		{
			$titulo = 'No se encontraron articulos con el resultado: ' . $busqueda;
		} 
		else 
		{
			$titulo = 'Resultados de la busqueda: ' . $busqueda;
		}
	} 


	/*if(!$solicitudes){
		echo 'ERROR POST';
		//header('Location: error.php');
	}*/
	  require '../views/tablaasistenciaporcodigo2.view.php';
	  
	}
	else {
		header('Location: login.php');
	}
 ?>


 </body>
 </html>


