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
        $this->Cell(276,10,'DATA MEMBER',0,0,'C');
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
        $this->Cell(40,10,'Nama',1,0,'C');
        $this->Cell(60,10,'Alamat',1,0,'C');
        $this->Cell(60,10,'Jenis Kelamin',1,0,'C');
        $this->Cell(60,10,'Telepon',1,0,'C');
        $this->Ln();
    }
    function viewTable($dbh){
        $this->SetFont('Times','',11);
        $query = $dbh->query("SELECT * FROM member");
        foreach ($query as $data) {
            $this->Cell(30,10,$data['id'],1,0,'C');
            $this->Cell(40,10,$data['nama'],1,0,'L');
            $this->Cell(60,10,$data['alamat'],1,0,'L');
            $this->Cell(60,10,$data['jenis_kelamin'],1,0,'L');
            $this->Cell(60,10,$data['tlp'],1,0,'L');
         
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