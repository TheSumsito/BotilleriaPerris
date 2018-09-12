<?php

require '../pdf/fpdf.php';

class PDF extends FPDF {
    function LoadData($file) {
        // Leer las líneas del fichero
        $lines = file($file);
        $data = array();
        foreach ($lines as $line)
            $data[] = explode(';', trim($line));
        return $data;
    }
    function BasicTable($data) {
        foreach ($data as $row) {
            foreach ($row as $col)
                $this->Cell(40, 6, $col, 1);
            $this->Ln();
        }
    }
}

$pdf = new PDF();
// Carga de datos
$data = $pdf->LoadData('lista.csv');
$pdf->SetFont('Arial', '', 24);
$pdf->AddPage('L');
$pdf->Cell(220, 20, "Listado de Productos", 0,0,'C');
$pdf->Ln();
$pdf->SetFont('Arial', '', 10);
$pdf->BasicTable($data);
$pdf->Image('../img/borracho.jpg', 120, 120);

$pdf->Output();
?>
    

