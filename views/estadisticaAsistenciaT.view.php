<?php
$connect = mysqli_connect("localhost", "root", "", "soportel");
$query = "SELECT date_format(fecha, '%m') 'fecha' , COUNT(a.asistencia) AS CONTAR FROM Asistencia a 
where a.asistencia='Tarde' 
GROUP BY asistencia , month(fecha) ORDER BY CONTAR DESC ";
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
<h3 align="center"></h3>
<div class="container">
  <div class="row">
      <div class="col-sm-4">
        
      </div>
    <div class="col-sm-4">
       <h3>Estadistica de Asistencia</h3>
    </div>
    <div class="col-sm-4">
       
    </div>
  </div>
</div>

<br><br>
 <div class="container" id="nombre">
  
 </div>
<div class="container">
  <div class="row">
    <div class="col-sm-6">
     <table class="table table-hover table-condensed table-bordered" id="tardanza">
    
      <thead id='-1'>
      <tr>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Numero de Tardanzas</th>
      </tr>
      </thead>
        
      
      </table>
    </div>

    <div class="col-sm-6">
     <h3 align="center">Estadistica de Meses</h3>
     <div id="chart"></div>
    </div>
  </div>
</div>

<script>

$(document).ready(function(){
    
       Morris.Bar({
 element : 'chart',
 data:[<?php echo $chart_data; ?>],
 xkey:'year',
 ykeys:['profit'],
 labels:['Tardanzas' ],
 hideHover:'auto',
 parseTime: false,
 gridIntegers: true,
ymin: 0
});
       
       llenarTabla('estadisticaBD2.php','tardanza');
      
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
         $('#'+clase+' #'+index).append('<th>'+ronda.codigo+'</th>');
         $('#'+clase+' #'+index).append('<th>'+ronda.nombre+'</th>');
         $('#'+clase+' #'+index).append('<th>'+ronda.tarde+'</th>');
      }

      $( "#1servicio" ).click(function() {
  alert("aa");
});
    
});

</script>
