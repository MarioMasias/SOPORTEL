<?php 

function conexion($bd_config){
	try {
		$conexion = new PDO('mysql:host=localhost;dbname='.$bd_config['basedatos'],$bd_config['usuario'],$bd_config['pass']);
		return $conexion;
	} catch (PDOException $e) {
		return false;
	}
}

function limpiarDatos($datos){
	$datos=trim($datos);//elimina espacios
	$datos=stripcslashes($datos);//quita las barras //
	$datos=htmlspecialchars($datos);
	return $datos;
}

function datos_usuarios($conexion){
	$sentencia = $conexion -> prepare ("SELECT * FROM trabajador");
	$sentencia->execute();
	return $sentencia->fetchAll();
}

function datos_solicitud($conexion,$estado){
	$sentencia = $conexion -> prepare ("SELECT * FROM solicitud_servicio where estado=:estado ");
	$sentencia->execute(array(':estado' =>$estado));
	return $sentencia->fetchAll();
}


function datos_objetos($conexion,$estado){
	$sentencia = $conexion -> prepare ("SELECT * FROM objetos_perdidos where estado=:estado ");
	$sentencia->execute(array(':estado' =>$estado));
	return $sentencia->fetchAll();
}


function pagina_actual(){
	return isset($_GET['p']) ? (int)$_GET['p'] : 1;
}

function id_articulo($id){
	return (int)limpiarDatos($id);
}

function obtener_post_por_id($conexion,$id){
	$resultado= $conexion->query("SELECT *FROM articulos WHERE id= $id LIMIT 1");
	$resultado= $resultado->fetchAll();
	return ($resultado) ? $resultado : false;
}

function insertarAsistencia($hora , $codigoUsuario ,$codigoEmpleado){
	$statement=$conexion->prepare(
		'INSERT INTO servicios(id,titulo,extracto)
		VALUES (null,:titulo,:extracto)'
		);

	$statement->execute(array(
		':titulo'=>$titulo,
		':extracto'=>$extracto
		));
}


function datos_realizado2($conexion){
	$sentencia = $conexion -> prepare ("SELECT e . * , i . * , t.nombre
FROM equipo e, inventario i, trabajador t
WHERE e.ID_EQUIPO = i.EQUIPO_ID_EQUIPO
AND i.Trabajador_codigo = t.codigo
AND i.lugar LIKE  '%laboratorio%' ");
	$sentencia->execute();
	return $sentencia->fetchAll();
}

function datos_realizado3($conexion){
	$sentencia = $conexion -> prepare ("SELECT e . * , i . * , t.nombre
FROM equipo e, inventario i, trabajador t
WHERE e.ID_EQUIPO = i.EQUIPO_ID_EQUIPO
AND i.Trabajador_codigo = t.codigo
AND i.lugar LIKE  '%salones%'
		");
	$sentencia->execute();
	return $sentencia->fetchAll();
}


function datos_realizado4($conexion){
	$sentencia = $conexion -> prepare ("SELECT * FROM equipo e, inventario i WHERE e.ID_EQUIPO = i.EQUIPO_ID_EQUIPO and i.lugar like '%Area%' ");
	$sentencia->execute();
	return $sentencia->fetchAll();
}

function fecha($fecha){
	$timestamp= strtotime($fecha);
	$meses = ['Enero','Febrero','Marzo','Abril','Mayo','Junio','Agosto','Setiembre','Octubre','Noviembre','Diciembre'];
	$dia = date('d',$timestamp);
	$mes =date('m',$timestamp)-1;
	$year = date('Y',$timestamp);

	$fecha = "$dia/".$meses[$mes]. "/$year";
	return $fecha;
}


 ?>