<?php 
//index.php

$co = $_POST['usuario'];
$connect = mysqli_connect("localhost", "root", "", "soportel");
$query = "SELECT date_format(fecha, '%m') 'mes', asistencia, COUNT(asistencia) AS CONTAR FROM Asistencia where idtrabajador= '14200140' and asistencia='Tarde'
GROUP BY  MONTH(fecha)";
$result = mysqli_query($connect, $query);
$chart_data = '';


while($row = mysqli_fetch_array($result))
{
  $asistencia = $row["CONTAR"];
  $fecha =  $row["mes"];
 $chart_data .= "{ year:'".$fecha."', profit:".$asistencia."},";
}
$chart_data = substr($chart_data, 0, -1);
header('Content-type: application/json; charset=utf-8');
          echo json_encode($chart_data);
          exit();

 
?>
 