<?php 

class bolsista {
  public $hora;
  public $fecha;
  public $nombre;
  public $turno;
  public $dia;
  public $asistencia;
}
require '../admin/config.php';

  require 'funciones.php';
  $conexion = conexion($bd_config);
 $id = $_POST['usuario'];
$consulta = $conexion->prepare('SELECT DISTINCT tu.horai "horai" , tu.horaf "horaf",tu.dia "dia" ,
 t.nombre "nombre", a.fecha "fecha", a.hora "hora" , a.asistencia "asistencia" 
 from asistencia a , trabajador t , turno tu 
 where a.idtrabajador=:id and a.idtrabajador = t.codigo and tu.idturno = a.idturno  ');
   $consulta->execute(array(
               ':id'=>$id
      )); 
    $arr = array();
    while ($registro = $consulta->fetch()) {
      $ris = new bolsista();
      $ris->fecha = $registro['fecha'];
      $ris->hora = $registro['hora'];
      $ris->nombre = $registro['nombre'];
      $ris->turno = $registro['horai'].'-'.$registro['horaf'];
      $ris->dia = $registro['dia'];
      $ris->asistencia = $registro['asistencia'];
      array_push($arr ,array('bolsista' => $ris));
    }

    header('Content-type: application/json; charset=utf-8');
          echo json_encode($arr);
          exit();
?>