<?php
include("path.php");
include SITE_ROOT . '/app/database/db.php';
require_once "vendor/autoload.php";

$products = selectAll('product');
$phpWord = new \PhpOffice\PhpWord\PhpWord();
$document = new \PhpOffice\PhpWord\TemplateProcessor('./ostatki.docx');
$uploadDir = __DIR__;
$outputFile = "ostatkiItog.docx";
$tableStyle = array(
//    'borderColor' => 'black',
//    'borderSize'  => 3
);
$cellStyle = array(
    'borderTopSize' =>3,
    'borderRightSize' =>3,
    'borderBottomSize' =>3,
    'borderLeftSize' =>3
);
$textStyle = array(
    'align'=>'center'
);
$section = $phpWord->addSection();
$section->addText('Ведомость наличия товаров',array('bold'=>true,'align'=>'center'));
$firstRowStyle = array('bgColor' => '66BBFF');
$phpWord->addTableStyle('Ostatki', $tableStyle, $firstRowStyle);
$table = $section->addTable('Ostatki');
$table->addRow(500);
$table->addCell(3000,$cellStyle)->addText('Наименование товара',$textStyle);
$table->addCell(3000,$cellStyle)->addText('Количество на складе',$textStyle);
for ($i=0;$i<count($products);$i++){
    $table->addRow(500);
    $name = $products[$i]['name'];
    $count = $products[$i]['count'];
    $cell = $table->addCell(3000,$cellStyle);
    $cell->addText($name);
    $cell = $table->addCell(3000,$cellStyle);
    $cell->addText($count);
//    $document->setValue("name",$name);
//    $document->setValue("count",$count);
//    $section = $document->cloneRowAndSetValues("name",$name);

}

$section->addText('Должность - ');
$section->addText('Подпись - ');


//$document->saveAs($outputFile);

header("Content-Type: application/octet-stream");
header("Content-Disposition: attachment; filename=ostatki.docx");
$objWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord,"Word2007");
$objWriter->save("php://output");

//$downloadFile = $outputFile;
//header("Content-Type: application/octet-stream");
//header("Accept-Ranges: bytes");
//header("Content-Length: " .filesize($downloadFile));
//header("Content-Disposition: attachment; filename=".$downloadFile);
//readfile($downloadFile);
////header('location:' . BASE_URL . 'profile.php');
