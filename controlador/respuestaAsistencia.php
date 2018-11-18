<?php 

    require '../admin/config.php';

	require 'funciones.php';
    
    class TableRows extends RecursiveIteratorIterator {
    function __construct($it) {
        parent::__construct($it, self::LEAVES_ONLY);
    }

    function current() {
        return "<td style='width:150px;border:1px solid black;'>" . parent::current(). "</td>";
    }

    function beginChildren() {
        //echo "<tr>";
    }

    function endChildren() {
        //echo "</tr>" . "\n";
    }
}
	$conexion = conexion($bd_config);
    $vap = -1;
	if(!$conexion){
		//echo 'ERROR CONEXION';
		//header('Location: error.php');
	}else{
        
        $codigo = $_POST['codigo2'];
        $dia = $_POST['dia'];
        $hora = $_POST['hora'];
        $fecha = $_POST['fecha'];
		$consulta= $conexion->prepare("SELECT idturno ,idtrabajador , horai FROM `turno` 
			WHERE idtrabajador=:id and dia = :dia and :hora between horai and horaf");
	   $consulta->execute(array(
               ':id'=>$codigo ,
				':dia'=>$dia ,
				':hora'=> $hora

	   	)); 
	   while ($registro = $consulta->fetch()) {
          $resp = $registro['idturno'];
          $horai = $registro['horai'];
    }
      if($resp == null){ 
      	echo 3;
      }else
      { 


      	   $hi = intval($horai[3].$horai[4]);
		   $hc= intval($hora[3].$hora[4]);
		   
		   if($hi + 15 > $hc and  $hi < $hc){
		     $tarde = 'Temprano';
		   }else {
		    $tarde = 'Tarde';
		   }

         $statement=$conexion->prepare(
				'INSERT INTO asistencia(idasistencia ,idtrabajador,fecha,hora ,idturno,asistencia)
				VALUES (:idasistencia ,:idtrabajador,:fecha,:hora,:idturno,:asistencia)'
				);

			$va = $statement->execute(array(
				':idtrabajador'=>$codigo,
				':fecha'=>$fecha ,
				':hora'=> $hora,
				':idasistencia' => $codigo.$_POST['day'],
				':idturno' => $resp,
				':asistencia' => $tarde
				));
			if($va == null){
				echo 1;
			}else{
				
				echo 0;
			}
      }
    }
	

//haciendo este echo estas respondiendo la solicitud ajax
?>