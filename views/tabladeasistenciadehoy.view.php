<?php
// Te recomiendo utilizar esta conección, la que utilizas ya no es la recomendada. 
$link = new PDO('mysql:host=localhost;dbname=soportel', 'root', ''); // el campo vaciío es para la password. 

?>
<style>
    .14 { color: #333333; }
  </style>
<h3 align="center">Asistencia por fecha</h3>
  <div class="container">
    <div class="row">
        <div class="col-sm-4">
          
        </div>
      <div class="col-sm-4">
         <input class="form-control" id="us" aria-describedby="emailHelp" type="text" name="usuario" class="usuario" placeholder="Escriba la fecha">
      </div>
      <div class="col-sm-4">
         <button type="button" class="btn btn-success" id="bu" >Aceptar</button>
      </div>

      
    </div>
  </div>
 <!--<div class="container" id="nombre">
  
 </div>-->
<div class="container">
  <div class="row">
    <div class="col-sm-12">
     <table class="table table-hover table-condensed table-bordered">
    
      <thead id='-1'>
      <tr>
          <th>Nombre</th>
          <th>Turno</th>
          <th>Hora de Ingreso</th>
          <th>Asistencia</th>
      </tr>
      </thead>
        
      
      </table>
    </div>
  </div>
</div>

<script>

$(document).ready(function(){
    $("#bu").click(function(){

      var us1 = $('#us').val();
      var parametros = {
                "fecha" : us1 
        };

        alert(us1);
        $.ajax({
                data: parametros,//datos que se envian a traves de ajax
                url:   'respuestaasistenciahoy.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                success:  function (data) { //una vez que el archivo recibe el request lo procesa y lo devuelve
                   $.each(data ,function(index){
                      var ronda = data[index].bolsista;
                      llenar(ronda , index);
                   })
                }
        });
    });

      function llenar(ronda , index){
         
         var a = index -1;
         $('#'+a).after('<tr id = '+index+'></tr>');
         $('#'+index).append('<th class="14">'+ronda.nombre+'</th>');
         $('#'+index).append('<th class="14">'+ronda.turno+'</th>');
         $('#'+index).append('<th class="14">'+ronda.hora+'</th>');
         $('#'+index).append('<th class="14">'+ronda.asistencia+'</th>');
      }

    
});

</script>
