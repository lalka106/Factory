<?php
include "../../path.php";
include SITE_ROOT . '/app/database/db.php';
require_once "../../vendor/autoload.php";
//include SITE_ROOT . "/app/controllers/order.php";
$pw = new \PhpOffice\PhpWord\PhpWord();

//add html
$section = $pw->addSection();
$html = "<h1>He</h1>";
$html .= "<p>fsfsf.</p>";
\PhpOffice\PhpWord\Shared\Html::addHtml($section,$html,false,false);

////save
//$pw->save("text.docx","Word2007");

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=text.docx");
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($pw,"Word2007");
$objWriter->save("php://output");
