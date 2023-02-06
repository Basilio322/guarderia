<?php
require('Assets/pdf/fpdf.php');

class PDF extends FPDF

{
	// Cabecera de página
	function Header()
	{
		// Logo
		$this->Image('Assets/img/logodb2.png', 10, 8, 33);
		$this->SetFont('Arial', '', 15);
		$this->Ln(10);
		$this->Cell(0, 0, utf8_decode('Centro Infantil Instituto Tecnológico "Don Bosquito"'), 0, 0, 'C');
		// Salto de línea
		$this->Ln(10);
	}

	// Pie de página
	function Footer()
	{
		// Posición: a 1,5 cm del final
		$this->SetY(-15);
		// Arial italic 8
		$this->SetFont('Arial', 'I', 8);
		// Número de página
		$this->Cell(0, 10, utf8_decode('Página ') . $this->PageNo() . '/{nb}', 0, 0, 'C');
	}
}

// Creación del objeto de la clase heredada
$pdf = new PDF('P', 'mm', array(215.9,279.4));

$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Times', '', 18);
$pdf->Ln(20);
$pdf->SetFillColor(121, 137, 242);
$pdf->Cell(180, 10, utf8_decode("Detalles de Inscripción"), 1, 1, 'C', 2);
$pdf->SetFont('Times', '', 14);
$pdf->Ln(5);
$pdf->SetFillColor(121, 167, 242);
$pdf->Cell(180, 5, utf8_decode('Datos del niño'), 1, 1, 'L',2);

$pdf->SetFont('Times', '', 12);
$pdf->Cell(11, 5, utf8_decode('N°'), 1, 0, 'L');
$pdf->Cell(47, 5, utf8_decode('Primer apellido'), 1, 0, 'L');
$pdf->Cell(47, 5, utf8_decode('Segundo apellido'), 1, 0, 'L');
$pdf->Cell(50, 5, utf8_decode('Nombres'), 1, 0, 'L');
$pdf->Cell(25, 5, utf8_decode('Genero'), 1, 1, 'L');

$pdf->SetFont('Times', '', 12);
foreach ($data['inscripcion'] as $row) {
	$pdf->Cell(11, 5, utf8_decode($row['ins_Id']), 1, 0, 'L');
	$pdf->Cell(47, 5, utf8_decode($row['reg_Paterno']), 1, 0, 'L');
	$pdf->Cell(47, 5, utf8_decode($row['reg_Materno']), 1, 0, 'L');
	$pdf->Cell(50, 5, utf8_decode($row['reg_Nombres']), 1, 0, 'L');
	$pdf->Cell(25, 5, utf8_decode($row['reg_Genero']), 1, 1, 'L');	
	
}

$pdf->SetFont('Times', '', 14);
$pdf->Cell(180, 5, utf8_decode('Datos de Inscripción'), 1, 1, 'L',2);
$pdf->SetFillColor(121, 167, 242);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(67, 5, utf8_decode('Peso'), 1, 0, 'L');
$pdf->Cell(56, 5, utf8_decode('Talla'), 1, 0, 'L');
$pdf->Cell(57, 5, 'Otros', 1, 1, 'L');
foreach ($data['inscripcion'] as $row) {
	$pdf->Cell(67, 5, utf8_decode($row['his_Peso']), 1, 0, 'L');
	$pdf->Cell(56, 5, utf8_decode($row['his_Talla']), 1, 0, 'L');
	$pdf->Cell(57, 5, utf8_decode($row['his_Otros']), 1, 1, 'L');
	
}



$pdf->SetFont('Times', '', 12);
$pdf->Cell(67, 5, utf8_decode('Fecha de Inscripción'), 1, 0, 'L');
$pdf->Cell(56, 5, utf8_decode('Gestion'), 1, 0, 'L');
$pdf->Cell(57, 5, 'Sala', 1, 1, 'L');
foreach ($data['inscripcion'] as $row) {
	$pdf->Cell(67, 5, utf8_decode($row['ins_fecha']), 1, 0, 'L');
	$pdf->Cell(56, 5, utf8_decode($row['ges_anio']), 1, 0, 'L');
	$pdf->Cell(57, 5, utf8_decode($row['s_nombre']), 1, 1, 'L');
	
}
//////////datos del padre de familia/////////
$pdf->Ln(5);
$pdf->SetFillColor(121, 137, 242);
$pdf->SetFont('Times', '', 14);
$pdf->Cell(180, 5, utf8_decode('Datos del Padre de Familia o Apoderado del Niño'), 1, 1, 'L',2);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(11, 5, utf8_decode('N°'), 1, 0, 'L');
$pdf->Cell(34, 5, utf8_decode('Primer apellido'), 1, 0, 'L');
$pdf->Cell(36, 5, utf8_decode('Segundo apellido'), 1, 0, 'L');
$pdf->Cell(39, 5, utf8_decode('Nombres'), 1, 0, 'L');
$pdf->Cell(30, 5, utf8_decode('Ci'), 1, 0, 'L');
$pdf->Cell(30, 5, utf8_decode('Parentesco'), 1, 1, 'L');
$pdf->SetFont('Arial', '', 12);
foreach ($data['inscripcion'] as $row) {
	$pdf->Cell(11, 5, utf8_decode($row['apod_Id']), 1, 0, 'L');
	$pdf->Cell(34, 5, utf8_decode($row['apod_Paterno']), 1, 0, 'L');
	$pdf->Cell(36, 5, utf8_decode($row['apod_Materno']), 1, 0, 'L');
	$pdf->Cell(39, 5, utf8_decode($row['apod_Nombres']), 1, 0, 'L');	
	$pdf->Cell(30, 5, utf8_decode($row['apod_Ci']), 1, 0, 'L');	
	$pdf->Cell(30, 5, utf8_decode($row['apod_Parentesco']), 1, 1, 'L');		
}
$pdf->SetFillColor(242, 233, 121);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(30, 5, utf8_decode('Celular'), 1, 0, 'L');
$pdf->Cell(80, 5, utf8_decode('Dirección'), 1, 0, 'L');
$pdf->Cell(70, 5, 'Carrera', 1, 1, 'L');
foreach ($data['inscripcion'] as $row) {
	$pdf->Cell(30, 5, utf8_decode($row['apod_Celular']), 1, 0, 'L');
	$pdf->Cell(80, 5, utf8_decode($row['apod_Direccion']), 1, 0, 'L');
	$pdf->Cell(70, 5, utf8_decode($row['apod_Carrera']), 1, 1, 'L');	
}
///////////////////////Contacto de Emergencia///////////////////////
$pdf->Ln(5);
$pdf->SetFillColor(121, 137, 242);
$pdf->SetFont('Times', '', 14);
$pdf->Cell(180, 5, utf8_decode('Datos del Contacto de Emergencia'), 1, 1, 'L',2);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(11, 5, utf8_decode('N°'), 1, 0, 'L');
$pdf->Cell(34, 5, utf8_decode('Primer apellido'), 1, 0, 'L');
$pdf->Cell(36, 5, utf8_decode('Segundo apellido'), 1, 0, 'L');
$pdf->Cell(39, 5, utf8_decode('Nombres'), 1, 0, 'L');
$pdf->Cell(30, 5, utf8_decode('Ci'), 1, 0, 'L');
$pdf->Cell(30, 5, utf8_decode('Parentesco'), 1, 1, 'L');
$pdf->SetFont('Arial', '', 12);
foreach ($data['inscripcion'] as $row) {
	$pdf->Cell(11, 5, utf8_decode($row['con_Id']), 1, 0, 'L');
	$pdf->Cell(34, 5, utf8_decode($row['con_Paterno']), 1, 0, 'L');
	$pdf->Cell(36, 5, utf8_decode($row['con_Materno']), 1, 0, 'L');
	$pdf->Cell(39, 5, utf8_decode($row['con_Nombres']), 1, 0, 'L');	
	$pdf->Cell(30, 5, utf8_decode($row['con_Ci']), 1, 0, 'L');	
	$pdf->Cell(30, 5, utf8_decode($row['con_Parentesco']), 1, 1, 'L');		
}
$pdf->SetFillColor(242, 233, 121);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(30, 5, utf8_decode('Celular'), 1, 0, 'L');
$pdf->Cell(150, 5, utf8_decode('Dirección'), 1, 1, 'L');

foreach ($data['inscripcion'] as $row) {
	$pdf->Cell(30, 5, utf8_decode($row['con_Celular']), 1, 0, 'L');
	$pdf->Cell(150, 5, utf8_decode($row['con_Direccion']), 1, 1, 'L');
	
}
///////////////////////Contacto de Emergencia///////////////////////
$pdf->Ln(5);
$pdf->SetFillColor(121, 137, 242);
$pdf->SetFont('Times', '', 14);
$pdf->Cell(180, 5, utf8_decode('Documentos proporcionados'), 1, 1, 'L',2);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(11, 5, utf8_decode('N°'), 1, 0, 'L');
$pdf->Cell(40, 5, utf8_decode('el niño cuenta con CI'), 1, 0, 'L');
$pdf->Cell(30, 5, utf8_decode('CI del niño'), 1, 0, 'L');
$pdf->Cell(50, 5, utf8_decode('Certificado de nacimiento'), 1, 0, 'L');
$pdf->Cell(49, 5, utf8_decode('tipo de seguro de salud'), 1, 1, 'L');


$pdf->SetFont('Arial', '', 12);
foreach ($data['inscripcion'] as $row) {
	$pdf->Cell(11, 5, utf8_decode($row['docu_id']), 1, 0, 'L');
	$pdf->Cell(40, 5, utf8_decode($row['docu_ci']), 1, 0, 'L');
	$pdf->Cell(30, 5, utf8_decode($row['docu_cinum']), 1, 0, 'L');
	$pdf->Cell(50, 5, utf8_decode($row['docu_certificado']), 1, 0, 'L');	
	$pdf->Cell(49, 5, utf8_decode($row['docu_ss']), 1, 1, 'L');	
	
}
$pdf->SetFillColor(242, 233, 121);
$pdf->SetFont('Times', '', 12);
$pdf->Cell(39, 5, utf8_decode('carnet de vacunas'), 1, 0, 'L');
$pdf->Cell(30, 5, utf8_decode('discapacidad'), 1, 1, 'L');

foreach ($data['inscripcion'] as $row) {
$pdf->Cell(39, 5, utf8_decode($row['docu_ciVacu']), 1, 0, 'L');		
$pdf->Cell(30, 5, utf8_decode($row['docu_disc']), 1, 1, 'L');		
	
}
$pdf->Output();
