<?php //Ejemplo curso PHP aprenderaprogramar.com
require '../admin/config.php';
require 'funciones.php';
$hoy = date("Y-n-j");
echo date('Y-n-j h:i:s');
echo $hoy;

$conexion= conexion($bd_config);

if(!$conexion){
	header('Location: error.php');
}

$statement1=$conexion->prepare(
		'SELECT * FROM trabajador'
		);

$nombre='Mario Arturo Masias Vilca';
$sentencia = $conexion -> prepare ("SELECT * FROM trabajador where Nombre='$nombre'");
								$aa=$sentencia->execute();
								
								$rec=$sentencia->fetchAll();
								

								 foreach($rec as $post): 

										$cod=$post['codigo'];
										  echo "codigo adentro"; 
										  echo $post['codigo'];
									
								 endforeach;



								 echo "codigo afuera";
								 echo $cod;

								?>