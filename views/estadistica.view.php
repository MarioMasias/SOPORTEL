<?php
// Te recomiendo utilizar esta conección, la que utilizas ya no es la recomendada. 
$link = new PDO('mysql:host=localhost;dbname=soportel', 'root', ''); // el campo vaciío es para la password. 

?>
<h3 align="center"></h3>
<div class="container">
  <div class="row">
      <div class="col-sm-4">
        
      </div>
    <div class="col-sm-4">
       <input class="form-control" id="us" aria-describedby="emailHelp" type="text" name="usuario" class="usuario" placeholder="Codigo de usuario">
    </div>
    <div class="col-sm-4">
       <button type="button" class="btn btn-success" id="bu" >Aceptar</button>
    </div>
  </div>
</div>
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
          <th>Ver Cuadro</th>
      </tr>
      </thead>
        
      
      </table>
    </div>

    <div class="col-sm-6">
     <table class="table table-hover table-condensed table-bordered" id="servicio">
    
      <thead id='-1'>
      <tr>
          <th>Codigo</th>
          <th>Nombre</th>
          <th>Numero de Servicios</th>
          <th>Ver Cuadro</th>
      </tr>
      </thead>
        
      
      </table>
    </div>
  </div>
</div>

<script>

$(document).ready(function(){
    

      var us1 = $('#us').val();
      var parametros = {
                "usuario" : us1 
        };

        
       
       llenarTabla('estadisticaBD.php','tardanza');
       llenarTabla('estadisticaServicio.php','servicio');
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

      $( "#1servicio" ).click(function() {
  alert("aa");
});
    
});

</script>

