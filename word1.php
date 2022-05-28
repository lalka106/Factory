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
    'borderLeftSize' =>3,
    'align' => 'center'
);
$textStyle = array(
    'align'=>'center'
);
$section = $phpWord->addSection();
$section->addText('ЧУП "Завод СВТ"',array('bold'=>true,'align'=>'center'));
$table = $section->addTable('Ostatki');
$table->addRow(500);
$table->addCell(3000,$cellStyle)->addText('Дата составления',$textStyle);
$table->addRow(500);
$cell = $table->addCell(3000,$cellStyle);
$cell->addText(date("j.n.Y"));
$section->addText('Ведомость наличия товаров',array('bold'=>true,'align'=>'center'));
$firstRowStyle = array('bgColor' => '66BBFF','bold'=>true);
$phpWord->addTableStyle('Ostatki', $tableStyle, $firstRowStyle);
$table = $section->addTable('Ostatki');
$table->addRow(500);
$table->addCell(3000,$cellStyle)->addText('Наименование товара',$textStyle);
$table->addCell(500,$cellStyle)->addText('Код товара',$textStyle);
$table->addCell(500,$cellStyle)->addText('Количество на складе, шт.',$textStyle);
$table->addCell(3000,$cellStyle)->addText('Учетная стоимость, руб. коп.',$textStyle);
for ($i=0;$i<count($products);$i++){
    $table->addRow(500);
    $name = $products[$i]['name'];
    $id = $products[$i]['id'];
    $count = $products[$i]['count'];
    $price = $products[$i]['price'];
    $cell = $table->addCell(3000,$cellStyle);
    $cell->addText($name);
    $cell = $table->addCell(500,$cellStyle);
    $cell->addText($id);
    $cell = $table->addCell(500,$cellStyle);
    $cell->addText($count);
    $cell = $table->addCell(3000,$cellStyle);
    $cell->addText($price);

//    $document->setValue("name",$name);
//    $document->setValue("count",$count);
//    $section = $document->cloneRowAndSetValues("name",$name);

}

$table->addRow(500);
$table->addCell(3000)->addText('Должность_________________',$textStyle);
$table->addCell(3000)->addText();
$table->addCell(3000)->addText();
$table->addCell(3000)->addText('Подпись___________________',$textStyle);



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
