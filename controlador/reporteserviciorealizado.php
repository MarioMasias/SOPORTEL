<?php
	include 'plantillaOficina.php';
	require 'conexion.php';
	//$query = "SELECT e.estado, m.id_municipio, m.municipio FROM t_municipio AS m INNER JOIN t_estado AS e ON m.id_estado=e.id_estado";
	$query ="SELECT * FROM solicitud_servicio where estado like '%realizado%' ";
	$resultado = $mysqli->query($query);
	
	$pdf = new PDF();
	$pdf->AliasNbPages();
	$pdf->AddPage();
	
	$pdf->SetFillColor(232,232,232);
	$pdf->SetFont('Arial','B',12);
	$pdf->Cell(20,6,'Trabajador',1,0,'C',1);
	$pdf->Cell(20,6,'Usuario',1,0,'C',1);
	$pdf->Cell(50,6,'Servicio',1,0,'C',1);
	$pdf->Cell(30,6,'Lugar',1,0,'C',1);
	$pdf->Cell(40,6,'Detalle',1,0,'C',1);
	//$pdf->MultiCell(100,5,'fecha',1,'C',1);
	$pdf->Cell(40,6,'Fecha',1,1,'C',1);
	
	$pdf->SetFont('Arial','',10);
	
	while($row = $resultado->fetch_assoc())
	{
		$pdf->Cell(20,6,$row['trabajador'],1,0,'C');
		$pdf->Cell(20,6,$row['usuario'],1,0,'C');
		$pdf->Cell(50,6,$row['servicio'],1,0,'C');
		$pdf->Cell(30,6,$row['lugar'],1,0,'C');
		$pdf->Cell(40,6,$row['detalle'],1,0,'C');
		//$pdf->MultiCell(100,5,$row['fecha'],1,'C',1);
		$pdf->Cell(40,6,$row['fecha'],1,1,'C');
	}
	$pdf->Output();
?>