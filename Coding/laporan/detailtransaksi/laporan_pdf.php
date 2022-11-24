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
        $this->Cell(276,10,'DATA DETAIL TRANSAKSI',0,0,'C');
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
        $this->Cell(40,10,'ID Transaksi',1,0,'C');
        $this->Cell(60,10,'ID Paket',1,0,'C');
        $this->Cell(70,10,'QTY',1,0,'C');
        $this->Cell(80,10,'Keterangan',1,0,'C');
        $this->Ln();
    }
    function viewTable($dbh){
        $this->SetFont('Times','',11);
        $query = $dbh->query("SELECT * FROM detailtransaksi");
        foreach ($query as $data) {
            $this->Cell(30,10,$data['id'],1,0,'C');
            $this->Cell(40,10,$data['id_transaksi'],1,0,'L');
            $this->Cell(60,10,$data['id_paket'],1,0,'L');
            $this->Cell(70,10,$data['qty'],1,0,'L');
            $this->Cell(80,10,$data['keterangan'],1,0,'L');
         
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