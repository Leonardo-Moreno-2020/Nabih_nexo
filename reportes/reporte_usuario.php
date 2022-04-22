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
    $this->Cell(60,10,'Reporte de usuarios',0,0,'C');
    // Salto de línea
    $this->Ln(20);

    $this->Cell(15,10,'Id',1,0,'C',0);
    $this->Cell(25,10,'Cedula',1,0,'C',0);
    $this->Cell(50,10,'Nombres',1,0,'C',0);
    $this->Cell(50,10,'Telefono',1,0,'C',0);
    $this->Cell(50,10,'Direccion',1,1,'C',0);


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
$consulta="SELECT*FROM usuario";
$resultado=$mysqli->query($consulta);

$pdf = new PDF();
$pdf->AliasNbPages();
$pdf->AddPage();
$pdf->SetFont('Arial','',9);

while($row = $resultado->fetch_assoc()){

    $pdf->Cell(15,10,utf8_decode($row['Id']),1,0,'C',0);
    $pdf->Cell(25,10,utf8_decode($row['Cedula']),1,0,'C',0);
    $pdf->Cell(50,10,utf8_decode($row['Nombres']),1,0,'C',0);
    $pdf->Cell(50,10,utf8_decode($row['Telefono']),1,0,'C',0);
    $pdf->Cell(50,10,utf8_decode($row['Direccion']),1,1,'C',0);
    
}

$pdf->Output();
?>