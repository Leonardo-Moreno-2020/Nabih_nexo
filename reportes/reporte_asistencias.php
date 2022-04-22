<?php
require('../fpdf/fpdf.php');

class PDF extends FPDF
{
// Cabecera de página
function Header()
{
    // Logo
    $this->Image('../Imagenes/Logo final.png',8,6,31);
    // Arial bold 15
    $this->Ln(20);
    $this->SetFont('Arial','B',12);
    // Movernos a la derecha
    $this->Cell(65);
    // Título
    $this->Cell(60,10,utf8_decode('Reporte de asistencias'),0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(30,10,'Id',1,0,'C',0);
    $this->Cell(30,10,'Contacto',1,0,'C',0);
    $this->Cell(30,10,'Visita',1,0,'C',0);
    $this->Cell(30,10,'Usuario',1,0,'C',0);
    $this->Cell(30,10,'Tecnico',1,0,'C',0);
    $this->Cell(40,10,'Administrador',1,1,'C',0);

}

// Pie de página
function Footer()
{
    // Posición: a 1,5 cm del final
    $this->SetY(-15);
    // Arial italic 8
    $this->SetFont('Arial','I',8);
    // Número de página
    $this->Cell(0,10,utf8_decode('Pagina').$this->PageNo().'/{nb}',0,0,'C');
}
}
include_once '../Conexion/Conexion_1.php';
$consulta="SELECT*FROM asistencia";
$resultado=$mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

while($row = $resultado->fetch_assoc()){

    $pdf->Cell(30,10,utf8_decode($row['Id']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Contacto']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Visita']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Id_usuario']),1,0,'C',0);
    $pdf->Cell(30,10,utf8_decode($row['Id_tecnico']),1,0,'C',0);
    $pdf->Cell(40,10,utf8_decode($row['Id_administrador']),1,1,'C',0);
  
    
}

$pdf->Output();
?>