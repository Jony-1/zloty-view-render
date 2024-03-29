<?php
    require_once "../Modelo/mantenerSesion.php";
    require('../Libreria_FPDF/fpdf.php');
    class MyFPDF extends FPDF
    {

        function Footer()
        {
        $this->setTextColor(120,120,155);
        $this->SetY(-10);
        $this->SetFont("Arial", "I", 8);
        $this->Cell(0, 10, utf8_decode("Página ") . $this->PageNo() . "/{nb}", 0, 0, "C");
        }
    }
    $pdf = new myFPDF();
    $pdf->AddPage();

    $pdf->SetFont("Arial", "B", 10);
    $pdf->Cell(60);
    $pdf->setTextColor(210,98,5);
    $pdf->SetY(15);
    $pdf->SetX(115);
    $pdf->Cell(70, 10, "LISTADO DE USUARIOS ", 1, 1, "C");
    $pdf->SetY(30);
    $pdf->SetX(100);
    $pdf->Cell(70, 10, "Fecha de Elaboracion del Reporte: ", 2, 2, "C");
    $pdf->SetX(168);
    $pdf->Write(-9,date('d/m/Y'));
    $pdf->SetY(20);
    $pdf->SetX(8);
    $pdf->SetFont("Times", "B", 15);
    $pdf->Cell(70, 10, "Zloty", 2, 2, "C");
    $pdf->Ln(3);
    $pdf->MultiCell(190,20, $pdf->Image('../Vista/img/logoSOLITO.png', $pdf->GetX()+5, $pdf->GetY()-18, 12) ,0,"C");
    $pdf->Ln(20);
    $pdf->setTextColor(178,88,14);
    $pdf->SetFont("Times", "B", 10);
    $pdf->Cell(20,10,'Id',1,0,'C',0);
    $pdf->Cell(30,10,'Nombre',1,0,'C',0);
    $pdf->Cell(40,10,'Apellido',1,0,'C',0);
    $pdf->Cell(40,10,'E-mail',1,0,'C',0);
    $pdf->Cell(30,10,'Telefono',1,0,'C',0);
    $pdf->Cell(30,10,'Ciudad',1,1,'C',0);

    $pdf->SetFont('Times','',10);
    $pdf->setTextColor(94,44,2);
    foreach ($matrizusuario as $row) {
        $pdf->Cell(20,10,$row['idUsuario'],1,0,'C',0);
        $pdf->Cell(30,10,$row['nombre'],1,0,'C',0);
        $pdf->Cell(40,10,$row['apellido'],1,0,'C',0);
        $pdf->Cell(40,10,$row['email'],1,0,'C',0);
        $pdf->Cell(30,10,$row['telefono'],1,0,'C',0);
        $pdf->Cell(30,10,utf8_decode($row['ciudad']),1,1,'C',0);

    }

    $pdf->Output();

?>