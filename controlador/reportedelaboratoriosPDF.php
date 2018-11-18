<?php
	include 'plantillaLaboratorios.php';
	require 'conexion.php';
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	$query ="SELECT e . * , i . * , t.nombre
FROM equipo e, inventario i, trabajador t
WHERE e.ID_EQUIPO = i.EQUIPO_ID_EQUIPO
AND i.Trabajador_codigo = t.codigo
AND i.lugar LIKE  '%laboratorio%'";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',10);
	$pdf->Cell(30,6,'BOLSISTA',1,0,'C',1);
	$pdf->Cell(20,6,'SBN',1,0,'C',1);
	$pdf->Cell(20,6,'SERIE',1,0,'C',1);
	$pdf->Cell(30,6,'TIPO',1,0,'C',1);
	$pdf->Cell(30,6,'FECHA',1,0,'C',1);
	$pdf->Cell(60,6,'DESCRIPCION',1,1,'C',1);
	
	$pdf->SetFont('Arial','',7);
	
	while($row = $resultado->fetch_assoc())
	{

		$pdf->Cell(30,6,utf8_decode($row['nombre']),1,0,'C');
		$pdf->Cell(20,6,utf8_decode($row['SBN']),1,0,'C');
		$pdf->Cell(20,6,$row['SERIE'],1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['TIPO']),1,0,'C');
		$pdf->Cell(30,6,utf8_decode($row['fecha']),1,0,'C');
		$pdf->Cell(60,6,utf8_decode($row['DESCRIPCION']),1,1,'C');
	}
	$pdf->Output();
?>