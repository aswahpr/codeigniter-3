<?php
require('assets/fpdf/fpdf.php');

class PDF extends FPDF
{

	// Simple table
	function BasicTable($header, $data, $filter)
	{
		// Header
		$this->Cell(33*6,7,"Laporan Data Berdasarkan ".$filter,1,0,"C");
		$this->Ln();
		foreach($header as $col){
			$this->Cell(33,7,$col,1,0,"C");
		}
		$this->Ln();
		// Data
		foreach($data as $row)
		{
			foreach($row as $col)
				$this->Cell(33,6,$col,1);
			}
			$this->Ln();
		}
	}



$pdf = new PDF();
// Column headings
$header = array('Kode Barang', 'Nama Barang', 'Satuan', 'Stok', 'Stok Min', 'Stok Max');
// Data loading
$data = $laporan->result();

$pdf->SetFont('Arial','',14);
$pdf->AddPage();
$pdf->BasicTable($header,$data,$filter);
$pdf->Output();
?>