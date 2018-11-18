<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "soportel");
$query = "SELECT date_format(fecha, '%m') 'mes', asistencia, COUNT(asistencia) AS CONTAR FROM Asistencia where idtrabajador=14200140 and asistencia='Tarde'
GROUP BY  MONTH(fecha)";
$result = mysqli_query($connect, $query);
$chart_data = '';


while($row = mysqli_fetch_array($result))
{
  $asistencia = $row["CONTAR"];
  $fecha =  $row["mes"];
 $chart_data .= "{ year:'".$fecha."', profit:".$asistencia."},";
 $i++;
}
$chart_data = substr($chart_data, 0, -1);
?>
 
 
<!DOCTYPE html>
<html>
 <head>
  <title>chart with PHP & Mysql | lisenme.com </title>
  <link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.css">
  <script src="//ajax.googleapis.com/ajax/libs/jquery/1.9.0/jquery.min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/raphael/2.1.0/raphael-min.js"></script>
  <script src="//cdnjs.cloudflare.com/ajax/libs/morris.js/0.5.1/morris.min.js"></script>
  
 </head>
 <body>
  <br /><br />
  <div class="container" style="width:900px;">
   <h2 align="center">Morris.js chart with PHP & Mysql</h2>
   <h3 align="center">Last 10 Years Profit, Purchase and Sale Data</h3>   
   <br /><br />
   <div id="chart"></div>
  </div>
 </body>
</html>
 
<script>


$(document).ready(function(){
Morris.Line({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'year',
 ykeys:['profit'],
 labels:['Profit'],
 hideHover:'auto',
 parseTime: false,
 gridIntegers: true,
      ymin: 0
});

});
</script>