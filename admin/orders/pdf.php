<?php
include "../../path.php";
include SITE_ROOT . '/app/database/db.php';
require_once "../../vendor/autoload.php";
require '../../vendor/setasign/fpdf/fpdf.php';
//include SITE_ROOT . "/app/controllers/order.php";


//class PDF extends FPDF {
//    function Header()
//    {
//       $this->Image();
//    }
//}
$pdf = new FPDF();
$pdf->SetMargins(10,60);
$pdf->SetAuthor('Sinkevich Eduard');
$pdf->SetTitle('Отчет по продукции',true);
$pdf->SetSubject('TCPDF Tutorial');
$pdf->SetKeywords('TCPDF, PDF, example, test, guide');
for ($i = 0;$i<3;$i++){
    $pdf->AddPage();
    $pdf->Image('C:/Users/sinke/Downloads/canvas-image' . $i . '.png',null,null,200,170);
}
$pdf->Output();

////save
//$pw->save("text.docx","Word2007");


