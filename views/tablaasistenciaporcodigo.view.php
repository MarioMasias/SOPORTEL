<?php
// Te recomiendo utilizar esta conección, la que utilizas ya no es la recomendada. 
$link = new PDO('mysql:host=localhost;dbname=soportel', 'root', ''); // el campo vaciío es para la password. 

?>
<h3 align="center">Buscar asistencia por bolsista</h3>
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
		<div class="col-sm-12">
		 <table class="table table-hover table-condensed table-bordered">
  	
			<thead id='-1'>
			<tr>
			    <th>Turno</th>
			    <th>Día</th>
				<th>Fecha</th>
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
                "usuario" : us1 
        };

        
        $.ajax({
                data: parametros,//datos que se envian a traves de ajax
                url:   'respuestatabla.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                success:  function (data) { 
                    if(data ==null){
                       alert("No hay asistencia");
                    }else{
                      $.each(data ,function(index){
                      var ronda = data[index].bolsista;
                      llenar(ronda , index);
                   })
                    }
                   
                }
        });
    });

      function llenar(ronda , index){
      	 if(index == 0 ){
            $('#nombre').append('<h5 align=\'center\'>Nombre:</h5> <h2 align=\'center\'>'+ronda.nombre+'</h2>');
      	 }
      	 var a = index -1;
      	 $('#'+a).after('<tr id = '+index+'></tr>');
      	 $('#'+index).append('<th>'+ronda.turno+'</th>');
      	 $('#'+index).append('<th>'+ronda.dia+'</th>');
         $('#'+index).append('<th>'+ronda.fecha+'</th>');
         $('#'+index).append('<th>'+ronda.hora+'</th>');
         $('#'+index).append('<th>'+ronda.asistencia+'</th>');
      }

    
});

</script>

