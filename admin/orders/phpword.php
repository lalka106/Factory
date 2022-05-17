<?php
include "../../path.php";
include SITE_ROOT . '/app/database/db.php';
require_once "../../vendor/autoload.php";
//include SITE_ROOT . "/app/controllers/order.php";
$pw = new \PhpOffice\PhpWord\PhpWord();


for ($i = 0;$i<3;$i++){
$section = $pw->addSection();
$section->addImage('C:/Users/sinke/Downloads/canvas-image' . $i . '.png',array('width'=>470,'height'=>365));
}



header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=text.docx");
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($pw,"Word2007");
$objWriter->save("php://output");