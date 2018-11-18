<?php 

class bolsista {
  public $codigo;
  public $tarde;
  public $nombre;
}
$bd_config = array(
  'basedatos'=>'soportel',
  'usuario'=>'root',
  'pass'=>''
  );


$blog_config=array(
  'post_por_pagina'=>'4'
  );

  require 'funciones.php';
  $conexion = conexion($bd_config);
 $id = $_POST['usuario'];
$consulta = $conexion->prepare('SELECT t.nombre \'nombre\' ,a.idTrabajador \'codigo\', COUNT(asistencia) AS CONTAR FROM Asistencia a, trabajador t
where a.asistencia =\'Tarde\' and a.idTrabajador=t.codigo
GROUP BY a.idTrabajador ORDER BY CONTAR DESC'); 
$consulta->execute(); 
    $arr = array();
    while ($registro = $consulta->fetch()) {
      $ris = new bolsista();
      $ris->codigo = $registro['codigo'];
      $ris->nombre= $registro['nombre'];
      $ris->tarde = $registro['CONTAR'];
      array_push($arr ,array('bolsista' => $ris));
    }

    header('Content-type: application/json; charset=utf-8');
          echo json_encode($arr);
          exit();
?>