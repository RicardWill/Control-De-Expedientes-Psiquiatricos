<?php

require('pdfLib/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    //$this->Image('logo.png',10,8,33);
    // Arial bold 15
    $this->SetFont('Arial','B',10);
    // Movernos a la derecha
    $this->Cell(60);
    // Título
    $this->Cell(70,10,'CONSULTAS EXPEDIDAS',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(10, 10, 'ID C', 1, 0, 'C', 0);
    $this->Cell(10, 10, 'ID P', 1, 0, 'C', 0);
    $this->Cell(10, 10, 'Cntro', 1, 0, 'C', 0);
    $this->Cell(10, 10, 'ID F', 1, 0, 'C', 0);
    $this->Cell(50, 10, 'Diagnostico', 1, 0, 'C', 0);
    $this->Cell(10, 10, 'Uso', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Cantidad', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Frecuencia', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Referido', 1, 0, 'C', 0);
    $this->Cell(15, 10, utf8_decode('Año'), 1, 1, 'C', 0);
}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Página ').$this->PageNo().'/{nb}',0,0,'C');
}
}

require '../connect/conexion.php';

$consulta = "SELECT * FROM consulta";
$resultado = $mysqli->query($consulta);



$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);


//$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(10, 10, $row['id_consulta'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['id_persona'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['id_centro_de_salud'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['id_psicofarmaco'], 1, 0, 'C', 0);
    $pdf->Cell(50, 10, $row['diagnostico'], 1, 0, 'C', 0);
    $pdf->Cell(10, 10, $row['uso_psicofarmaco'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['cantidad_psicofarmaco'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['frecuencia_psicorfarmaco'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['referido'], 1, 0, 'C', 0);
    $pdf->Cell(15, 10, $row['anio_consulta'], 1, 1, 'C', 0);
}



$pdf->Output();

?>