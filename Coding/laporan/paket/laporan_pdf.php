<?php
error_reporting(0); 
require "../fpdf/fpdf.php";

$dbh = new PDO ('mysql:host=localhost;dbname=aplikasipengelolaanlaundry', "root", "");

class myPDF extends FPDF{
    function header(){
        $this->SetFont('Arial', 'B', 14);
        $this->Cell(276,5,'APLIKASI PENGELOLAAN LAUNDRY', 0,0,'C');
        $this->Ln();
        $this->SetFont('Times','',12);
        $this->Cell(276,10,'DATA PAKET',0,0,'C');
        $this->Ln(20);
    }
    function footer(){
        $this->SetY(-15);
        $this->SetFont('Arial','',8);
        $this->Cell(0,10,'Page'.$this->PageNo().'/{nb}',0,0, 'C');
    }
    function headerTable(){
        $this->SetFont('Times', 'B' , 11);
        $this->Cell(30,10,'ID',1,0,'C');
        $this->Cell(40,10,'ID Outlet',1,0,'C');
        $this->Cell(60,10,'Jenis',1,0,'C');
        $this->Cell(70,10,'Nama Paket',1,0,'C');
        $this->Cell(80,10,'Harga',1,0,'C');
        $this->Ln();
    }
    function viewTable($dbh){
        $this->SetFont('Times','',11);
        $query = $dbh->query("SELECT * FROM paket");
        foreach ($query as $data) {
            $this->Cell(30,10,$data['id'],1,0,'C');
            $this->Cell(40,10,$data['id_outlet'],1,0,'L');
            $this->Cell(60,10,$data['jenis'],1,0,'L');
            $this->Cell(70,10,$data['nama_paket'],1,0,'L');
            $this->Cell(80,10,$data['harga'],1,0,'L');
         
            $this->Ln();

        }        
    }
}

$pdf= new myPDF();
$pdf->AliasNbPages();
$pdf->AddPage('L', 'A4',0);
$pdf->headerTable();
$pdf->viewTable($dbh);
$pdf->Output();
?>