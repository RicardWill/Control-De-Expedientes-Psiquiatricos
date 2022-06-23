<?php

session_start();

if(!isset($_SESSION['tipo_usuario'])){
    header("Location: login.php");
}

$tipo_usuario = $_SESSION['tipo_usuario'];

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
    $this->Cell(70,10,'USUARIOS REGISTRADOS',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(15, 10, 'ID P', 1, 0, 'C', 0);
    $this->Cell(20, 10, 'Edad', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Sexo', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Estudios', 1, 0, 'C', 0);
    $this->Cell(30, 10, 'Estado Civil', 1, 0, 'C', 0);
    $this->Cell(35, 10, 'Ocupacion', 1, 0, 'C', 0);
    $this->Cell(25, 10, 'Tipo Usuario', 1, 1, 'C', 0);
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


//
if($tipo_usuario == 1){
    $where = "";
}else if($tipo_usuario == 2){
    $where = "WHERE tipo_usuario='$tipo_usuario'";
}
//

$consulta = "SELECT * FROM persona $where";
$resultado = $mysqli->query($consulta);





$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',10);


//$pdf->SetFont('Arial','B',16);
//$pdf->Cell(40,10,utf8_decode('¡Hola, Mundo!'));

while($row = $resultado->fetch_assoc()){
    $pdf->Cell(15, 10, $row['id_persona'], 1, 0, 'C', 0);
    $pdf->Cell(20, 10, $row['edad'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['sexo'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['estudios'], 1, 0, 'C', 0);
    $pdf->Cell(30, 10, $row['estado_civil'], 1, 0, 'C', 0);
    $pdf->Cell(35, 10, $row['ocupacion'], 1, 0, 'C', 0);
    $pdf->Cell(25, 10, $row['tipo_usuario'], 1, 1, 'C', 0);
}



$pdf->Output();

?>