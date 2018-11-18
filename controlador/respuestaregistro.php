<?php 

    require '../admin/config.php';

	require 'funciones.php';
 
	$conexion = conexion($bd_config);
    $vap = -1;
	if(!$conexion){
		echo -1;
		//header('Location: error.php');
	}else{
        

         $statement=$conexion->prepare(
				'INSERT INTO trabajador(codigo ,nombre,dni,fechanacimiento ,usuario,tipodetrabajador,pass)
				VALUES (:codigo ,:nombre,:dni,:fechanacimiento ,:usuario,:tipodetrabajador,:pass)'
				);

			$va = $statement->execute(array(
				':codigo'=>$_POST['codigo2'],
				':nombre'=>$_POST['nombre'] ,
				':dni'=> $_POST['dni'],
				':fechanacimiento' => $_POST['cumpleaños'],
				':usuario'=> $_POST['usuario'],
				':tipodetrabajador' => 'Bolsista',
				':pass' => $_POST['contraseña']
				));

			echo 0;
      
    }
	

//haciendo este echo estas respondiendo la solicitud ajax
?>