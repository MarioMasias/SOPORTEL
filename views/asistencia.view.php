

<div class="container">
  <div class="jumbotron">
    <h2 align="center">Registro de Asistencia</h2>

     <iframe src="https://www.zeitverschiebung.net/clock-widget-iframe-v2?language=es&size=small&timezone=America%2FLima" width="100%" height="90" frameborder="0" seamless></iframe> 
    <br>
    

     <div class="container">
     <div class="row" i>
	  <div class="col-sm-4">
            
       </div>
        <div class="col-sm-4" >
            <label for="exampleInputEmail1">Codigo</label>
            <!--<input class="form-control" id="valor2" aria-describedby="emailHelp" type="text" name="codigo" class="codigo" placeholder="Escribir codigo">-->
            <select class="form-control" id="valor2" aria-describedby="emailHelp" name="codigo" class="codigo">
                            <?php 
                                $sentencia = $conexion -> prepare ("SELECT * FROM trabajador");
                                $sentencia->execute();
                                $rec=$sentencia->fetchAll();
                                foreach($rec as $row){
                                    echo "<option value ='".$row['codigo']."'";
                                    echo ">";
                                    echo $row['nombre'];
                                    echo "</option>";
                                }               
                             ?>
                        </select>         
	  </div>
	  <div class="col-sm-4">
	  <br>
	  <button type="button" class="btn btn-success" id="bu" >Aceptar</button>
      </div>  
	  </div>
	 </div>
	</div> 
</div>
   
   <script>

$(document).ready(function(){
    $("#bu").click(function(){
        $("#f").remove();
        var d = new Date();
        var mes = d.getMonth()+1;
        var fecha = d.getFullYear()+'-'+mes+'-'+d.getDate();
        var dia =d.getDate();
        var minu = d.getMinutes();
        var hora1 = new Date().getHours();
        var cod = d.getFullYear()+''+mes+''+d.getDate();
        if(hora1 <= 9){
            hora1='0'+hora1;
        }
        if(minu <= 9){
            minu='0'+minu;
        }
        var hora = hora1 + ':'+ minu;
        var codigo = $('#valor2').val();
        var day;
        switch (new Date().getDay()) {
            case 0:
                day = "Domingo";
                break;
            case 1:
                day = "Lunes";
                break;
            case 2:
                day = "Martes";
                break;
            case 3:
                day = "Miercoles";
                break;
            case 4:
                day = "Jueves";
                break;
            case 5:
                day = "Viernes";
                break;
            case 6:
                day = "Sabado";
        }

        var parametros = {
                "codigo2" : codigo,
                "hora"  : hora,
                "fecha" : fecha,
                "dia":day,
                "cod":cod,
                "day":dia
        };
        $.ajax({
                data:  parametros, //datos que se envian a traves de ajax
                url:   'respuestaAsistencia.php', //archivo que recibe la peticion
                type:  'post', //método de envio
                success:  function (response) { //una vez que el archivo recibe el request lo procesa y lo devuelve

                   
                    var num = parseInt(response);
                    
                    if(response == 0){
                        $("#valor2").after("<font color='black' id='f'>Se registro la asistencia</font>");
                    }else if (response == 1) {
                        
                        $("#valor2").after("<font color='red' id='f'>Ya se ha registrado la asistencia de esta cuenta</p>");
                    }else{
                        $("#valor2").after("<font color='red' id='f'>No es su horario de entrada</p>");
                    }
                }
        });
    });

    
});

</script>
