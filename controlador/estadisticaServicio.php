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
$consulta = $conexion->prepare('SELECT t.nombre \'nombre\', COUNT(estado) AS CONTAR FROM solicitud_servicio a, trabajador t
where a.estado =\'Realizado\' and a.Trabajador=t.codigo
GROUP BY a.Trabajador ORDER BY CONTAR DESC'); 
$consulta->execute(); 
    $arr = array();
    while ($registro = $consulta->fetch()) {
      $ris = new bolsista();
      $ris->nombre= $registro['nombre'];
      $ris->tarde = $registro['CONTAR'];
      array_push($arr ,array('bolsista' => $ris));
    }

    header('Content-type: application/json; charset=utf-8');
          echo json_encode($arr);
          exit();
?>