<?php 
//index.php
$connect = mysqli_connect("localhost", "root", "", "soportel");
$query = "SELECT t.nombre ,a.idtrabajador , COUNT(a.asistencia) AS CONTAR FROM Asistencia a , Trabajador t
where a.asistencia='Tarde' and t.codigo=a.idtrabajador
GROUP BY a.idTrabajador ORDER BY CONTAR DESC ";
$result = mysqli_query($connect, $query);

$i=0;
$nombre;
$contar;
$codigo;
while($row = mysqli_fetch_array($result))
{
  if($i == 0){
     $nombre = $row["nombre"];
     $codigo = $row["idtrabajador"];
    $contar =  $row["CONTAR"];
   $i++;
  }
  
}

$query = "SELECT date_format(fecha, '%m') 'mes', asistencia, COUNT(asistencia) AS CONTAR FROM Asistencia where idtrabajador=$codigo and asistencia='Tarde'
GROUP BY  MONTH(fecha)";
$result = mysqli_query($connect, $query);
$chart_data = '';

$meses = array('enero','febrero','marzo','abril','mayo','junio','julio',
               'agosto','septiembre','octubre','noviembre','diciembre');
while($row = mysqli_fetch_array($result))
{
  $asistencia = $row["CONTAR"];
  $fecha =  $row["mes"];
 $chart_data .= "{ year:'".$fecha."', profit:".$asistencia."},";
 $i++;
}
$chart_data = substr($chart_data, 0, -1);
  


$query = "SELECT COUNT(a.estado) AS CONTAR 
FROM solicitud_servicio a , trabajador t where a.estado ='Realizado' and a.trabajador =t.codigo 
 ";
$result = mysqli_query($connect, $query);



$contar2;

while($row = mysqli_fetch_array($result))
{
    $contar2 =  $row["CONTAR"]; 
    echo $contar2;
}


$query = "SELECT date_format(fecha, '%m') 'fecha' , COUNT(a.estado) AS CONTAR 
FROM solicitud_servicio a  where a.estado ='Realizado' 
GROUP BY  MONTH(FECHA) ORDER BY CONTAR DESC ";
$result = mysqli_query($connect, $query);
$chart_data2 = '';

while($row = mysqli_fetch_array($result))
{
  $asistencia = $row["CONTAR"];
  $fecha =  $row["fecha"];
 $chart_data2 .= "{ year:'".$fecha."', profit:".$asistencia."},";
 $i++;
}
$chart_data2 = substr($chart_data2, 0, -1);

?>
 
<div class="container">
  <div class="row">
    <div class="col-sm-4">
       <h3>Persona con más tardanzas</h3>
       <div id="tardon">
        <h6><?php echo $nombre; ?></h6>
        <h6> , Numero = <?php echo $contar; ?></h6>
       </div><h2></h2>
       <div id="chart"></div>
       <div align="center" id="tar"><a href="estadisticaAsistenciaT.php"><button type="button" class="btn btn-primary" id="tardanza1">Ver más</button></a></div>
    </div>

    <div class="col-sm-4">
       <h3>Servicios realizados</h3>
       <div id="servicio">
        <h6>Numero de servicios realizados <?php echo $contar2; ?></h6>       
       </div><h2></h2>
       <div id="chart2"></div>
     
    </div>

    <div class="col-sm-4">
     <h3>Bolsista Destacados</h3>
     <table class="table table-hover table-condensed table-bordered" id="tardanza">
      <thead id='-1'>
        <tr>
            <th>Nombre</th>
            <th>Asistencias Temprano</th>
        </tr>
        </thead>
      </table>
      <br>
    
    </div>
  </div>
</div>
 

<script>


$(document).ready(function(){
  
Morris.Line({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'year',
 ykeys:['profit'],
 labels:['Faltas'],
 hideHover:'auto',
 parseTime: false,
 gridIntegers: true,
ymin: 0
});

Morris.Bar({
 element : 'chart2',
 data:[<?php echo $chart_data2; ?>],
 xkey:'year',
 ykeys:['profit'],
 labels:['Servicios Realizados' ],
 hideHover:'auto',
 parseTime: false,
 gridIntegers: true,
ymin: 0
});


      llenarTabla('estadisticaBD2.php','tardanza');
       //llenarTabla('estadisticaServicio.php','servicio');
       function llenarTabla(doc , clase){
        var us1 = $('#us').val();
      var parametros = {
                "usuario" : us1 
        };

        $.ajax({
                data: parametros,//datos que se envian a traves de ajax
                url:   doc, //archivo que recibe la peticion
                type:  'post', //método de envio
                success:  function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                  
                   $.each(data ,function(index){
                      var ronda = data[index].bolsista;
                      
                      llenar(ronda , index,clase);
                   })
                }
        });
       }

      function llenar(ronda , index,clase){
         var a = index -1;
         $('#'+clase+' #'+a).after('<tr id = '+index+'></tr>');
         $('#'+clase+' #'+index).append('<th>'+ronda.nombre+'</th>');
         $('#'+clase+' #'+index).append('<th>'+ronda.tarde+'</th>');
      }

   
});
</script>